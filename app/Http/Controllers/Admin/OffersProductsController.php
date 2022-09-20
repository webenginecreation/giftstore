<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Offers;
use App\Admin\Product;
use App\Admin\OffersProducts;

class OffersProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $allOffers = Offers::orderBy('id', 'DESC')->get();
       $allproducts = Product::with('category')->where('status','1')->where('stock_status','1')->orderBy('id', 'DESC')->get();
    
            
       return view('Admin.offers_products',compact('allOffers','allproducts'));
    }
    
      public function ShowOffersWithProducts()
    {
      
       $ShowOffersWithProducts = Offers::with('category')->orderBy('id', 'DESC')->get();
    
            
      // return view('Admin.offers_products',compact('allOffers','allproducts'));
    }
    
    

    public function create()
    {
        $allOffers = Offers::orderBy('id', 'DESC')->get();
        return view('Admin.offers',compact('allOffers'));
        
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'offers_id' => 'required',
            'product_id' => 'required',
        ]);
        $arr = $request->product_id;
        $cnt =  count($arr);
        
        for($i=0; $i < $cnt;$i++)
        {
            $requestData = $request->all();
            $requestData['product_id'] = $arr[$i];
            //dd($requestData);
            OffersProducts::create($requestData);
            
        }
        
    //   OffersProducts::create($request->all());
        return redirect()->route('offers.products')
         ->with('success','Products added successfully.');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data =Offers::find($id);
        $allOffers = Offers::orderBy('id', 'DESC')->get();
        return view('Admin.offers',compact('data','allOffers'));
    }

   
    public function update(Request $request, $id)
    {
        $data =Offers::find($id);

        $requestData = $request->all();
        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('create.offers')->with('success','Offers update successfully.');
    }

   
    public function destroy($id)
    {
        $delete = OffersProducts::find($id)->delete();

        if ($delete) 
        {
           return redirect()->back()->with('success','Offers Product Removed');;
        }
    }
}
