<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
    public function index()
    {
        //
        $Categories = Category::orderBy('id', 'DESC')->get();
        $SubCategories = Subcategory::with('category')->orderBy('id', 'DESC')->get();
        return view('Admin.sub_categories',compact('Categories','SubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'category_id' => 'required',
            'sub_category_name' => 'required',
            'sub_category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        
       
        if (Subcategory::where('sub_category_name', '=', $request->sub_category_name)->exists()) {
          
            return redirect()->back()->with('error','Sub Category is already exist'); 
        }
        
        $imageName = time().'.'.$request->sub_category_image->getClientOriginalName();
        $request->sub_category_image->move(public_path('images'), $imageName);
       
        $requestData['sub_category_image'] = $imageName;
        Subcategory::create($requestData);
        return redirect()->route('subcategory.index')
        ->with('success','Sub category added successfully.');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
