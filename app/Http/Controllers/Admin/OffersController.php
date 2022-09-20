<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Offers;
use App\Admin\OffersProducts;
class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = new Category;
        $Categories = Category::orderBy('id', 'DESC')->get();
        return view('Admin.categories',compact('Categories','data'));
    }
    
     public function statusChange($status,$id)
    {
      if($status == 1)
      {
          Offers::where("id",$id)->update(["status" => "0"]);
           return redirect()->route('create.offers')
        ->with('success','Status Changed.');
          
      }
      else
      {
          Offers::where("id",$id)->update(["status" => "1"]);
            return redirect()->route('create.offers')
        ->with('success','Status Changed.');
      }
    }
    
    public function getAllOffersWithProducts()
    {
        $getAllOffersWithProducts = OffersProducts::join('offers', 'offers_products.offers_id', '=', 'offers.id')->join('products', 'offers_products.product_id', '=', 'products.id')->get();
        
     
         $grouped = $getAllOffersWithProducts->groupBy('offers_name');
         
         
        //   foreach($grouped as $i => $value)
        //     {
        //         //dd($i);      
        //         echo "<Table border='1'> <tr> <th> $i </th>
        //         <th> Product name </th>
                    
        //             </tr>";
        //         foreach($value as $index)
        //         {
        //             echo "<tr> <td> $index->offers_name </td> <td> $index->name  </td> </tr>";
        //         }
                
        //         echo "<table>";
        //     }        
            
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allOffers = Offers::orderBy('id', 'DESC')->get();
        return view('Admin.offers',compact('allOffers'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'offers_name' => 'required',
             'start_date' => 'required',
              'end_date' => 'required',
               'status' => 'required',
        ]);
       
        if (Offers::where('offers_name', '=', $request->offers_name)->exists()) {
          
            return redirect()->back()->with('error','Offers is already exist'); 
        }

        Offers::create($request->all());
        return redirect()->route('create.offers')
         ->with('success','Offers added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $getOffersById =OffersProducts::with('hasOneOffers')->with('hasOneProduct')->where('offers_id',$id)->get();
        return view('Admin.get_offers_products_details',compact('getOffersById'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Offers::find($id);
        $allOffers = Offers::orderBy('id', 'DESC')->get();
        return view('Admin.offers',compact('data','allOffers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data =Offers::find($id);

        $requestData = $request->all();
        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('create.offers')->with('success','Offers update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Offers::find($id)->delete();

        if ($delete) 
        {
           return redirect()->route('create.offers')->with('success','Offers deleted successfully');;
        }
    }
}
