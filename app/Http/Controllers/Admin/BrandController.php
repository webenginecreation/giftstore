<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Brand\BrandInterface as BrandInterface;


class BrandController extends Controller
{
    //


    public function __construct(BrandInterface $brand)
    {
    	parent::__construct();//This is Mail controller Instant For Site Config Data
    	$this->brand = $brand;
    }

    public function index()
    {
        $brands = $this->brand->getAll();
        //dd($brands);
        return view('Admin.Brands.index',compact('brands'));
    }
    public function store(Request $request)
    {

    	 $request->validate([
            'brand_name' => 'required',
            'brand_icon' => 'required',
          ]);
        $brands = $this->brand->storeBrand($request->all());
        return redirect()->back()->with('success','Brand Added Successfully');
    }

     public function edit($id)
    {	
    	$brands = $this->brand->getAll();
        $brandByid = $this->brand->find($id);
        return view('Admin.Brands.index',compact('brands','brandByid'));
    }

    public function update($id, Request $request)
    {	
          $request->validate([
            'brand_name' => 'required',
          ]);
        $brands = $this->brand->update($id,$request->all());
        return redirect()->route('brand.index')->with('success','Brand Updated Successfully');
    }
    public function delete($id)
    {
        $brands = $this->brand->delete($id);
        return redirect()->back()->with('success','Brand deleted Successfully');
    }

}
