<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Brand;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $brands = Brand::all();
        return view('Admin.categories',compact('Categories','data','brands'));
    }
    
     public function statusChange($status,$id)
    {
      if($status == 1)
      {
          Category::where("id",$id)->update(["status" => "0"]);
           return redirect()->route('category')
        ->with('success','Status Changed.');
          
      }
      else
      {
          Category::where("id",$id)->update(["status" => "1"]);
            return redirect()->route('category')
        ->with('success','Status Changed.');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('Admin.categories',compact('Categories'));
        
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
            'category_name' => 'required',
        ]);


       
        if (Category::where('category_name', '=', $request->category_name)->exists()) {
          
            return redirect()->back()->with('error','Category is already exist'); 
        }

        $requestData = $request->all();

        $requestData['category_slug'] = Str::slug( $request->category_name,'-');

         if ($request->hasFile('category_icon'))
          {
            $imageName = time().'.'.$request->category_icon->getClientOriginalName();
            $request->category_icon->move(public_path('category_images'), $imageName);
            $requestData['category_icon'] = $imageName;
          }

          if ($request->hasFile('category_banner'))
          {
            $imageName = time().'.'.$request->category_banner->getClientOriginalName();
            $request->category_banner->move(public_path('category_images'), $imageName);
            $requestData['category_banner'] = $imageName;
          }


        Category::create($requestData);
        return redirect()->route('category')
        ->with('success','category added successfully.');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =Category::find($id);
        $Categories = Category::orderBy('id', 'DESC')->get();
         $brands = Brand::all();
        return view('Admin.categories',compact('Categories','data','brands'));
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
        $data =Category::find($id);
        $request->validate([
            'category_name' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['category_slug'] = Str::slug( $request->category_name,'-');

        if ($request->hasFile('category_icon'))
          {
            
            $imageName = time().'.'.$request->category_icon->getClientOriginalName();
            $request->category_icon->move(public_path('category_images'), $imageName);
            $requestData['category_icon'] = $imageName;
          }
          else
          {
              $requestData['category_icon'] = $request->old_icon;
          }

          if ($request->hasFile('category_banner'))
          {
            
            $imageName = time().'.'.$request->category_banner->getClientOriginalName();
            $request->category_banner->move(public_path('category_images'), $imageName);
            $requestData['category_banner'] = $imageName;
          }
          else
          {
              $requestData['category_banner'] = $request->old_banner;
          }
        



        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('category')->with('success','category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::find($id)->delete();

        if ($delete) 
        {
           return redirect()->route('category')->with('success','category deleted successfully');;
        }
    }


    public function addbrands(Request $request)
    {
            $category = Category::find($request->category_id);
            $brandIds = $request->brandchk;
            $category->brands()->sync($brandIds);
            return redirect()->back()->with('success','Brands Added in category');
    }

    public function getBrands($id)
    {
         $cagtegories = Category::find($id); 
         return json_encode($cagtegories->brands);
    }
}
