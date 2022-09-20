<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\blogCategory;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    //

	 public function index()
	{
	    $editData=new blogCategory;
		$BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        return view('Admin.blog_category',compact('BlogCategories','editData'));
	}

	 public function store(Request $request)
    {
        //
        $request->validate([
            'blog_category_name' => 'required',
        ]);
       
        if (blogCategory::where('blog_category_name', '=', $request->blog_category_name)->exists()) {
          
            return redirect()->back()->with('error','Blog category Name is already exist'); 
        }
        $requestData = $request->all();
        $requestData['blog_category_slug'] = \Str::slug($request->blog_category_name);
        blogCategory::create($requestData);
        return redirect()->route('blog-category.index')
        ->with('success','blog-category added successfully.');
    }
    
    public function edit($id)
    {
        $editData=blogCategory::find($id);
        $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        return view('Admin.blog_category',compact('BlogCategories','editData'));
    }
    
    public function update(Request $request, $id)
    {
        $data =blogCategory::find($id);

        $requestData = $request->all();
        $requestData['blog_category_slug'] = \Str::slug($request->blog_category_name);
        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('blog-category.index')
        ->with('success','blog-category updates successfully.');
    }
    
     public function destroy($id)
    {
        $delete = blogCategory::find($id)->delete();

        if ($delete) 
        {
           return redirect()->route('blog-category.index')
        ->with('success','blog-category deleted successfully.');
        }
    }
        


    
}
