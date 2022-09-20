<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\blogCategory;
use Illuminate\Support\Str;
use App\Admin\Blog;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::with('getAllBlogsWithCategory')->get();
        $data = new Blog;
     	$BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
     	return view('Admin.addblogs',compact('BlogCategories','blogs','data'));

    }

    public function store(Request $request)
    {
        
        $blog = new  \App\Admin\Blog;
        $request->validate(['blog_category_id' => 'required', 'blog_title' => 'required', 'blog_images' => 'required', 'blog_details' => 'required', 'status' => 'required', ]);
        
        if (Blog::where('blog_title', '=', $request->blog_title)
            ->exists())
        {

            return redirect()
                ->back()
                ->with('error', 'Blog name is already exist');
        }

        $requestData = $request->all();
        $requestData['blog_slug'] = \Str::slug($request->blog_title);
        $imageName = time() . '.' . $request
            ->blog_images
            ->getClientOriginalName();
        $request
            ->blog_images
            ->move(public_path('blogimg') , $imageName);
        $requestData['blog_images'] = $imageName;

        if ($request->filled('blog_video_link'))
        {
            $url = $request->blog_video_link;
            $requestData['blog_video_link'] = $blog->getYoutubeEmbedUrl($url);
        }

        Blog::create($requestData);
        return redirect()->route('blog.index')
            ->with('success', 'Blog added successfully.');

    }
    
    public function edit($id)
    {
        $blogs = Blog::with('getAllBlogsWithCategory')->get();
        $data = Blog::find($id);
     	$BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
     	return view('Admin.addblogs',compact('BlogCategories','blogs','data'));
    }
    
    public function update(Request $request,$id)
    {
        $data =Blog::find($id);
        $requestData = $request->all();
        $requestData['blog_slug'] = \Str::slug($request->blog_title);
        if ($request->hasFile('blog_images'))
         {

            $imageName = time() . '.' . $request
                ->blog_images
                ->getClientOriginalName();
            $request
                ->blog_images
                ->move(public_path('blogimg') , $imageName);
            $requestData['blog_images'] = $imageName;
         }else
         {
             $requestData['blog_images'] = $request->old_blog_images;
         }

        if ($request->filled('blog_video_link'))
        {
            //$url = ;
            $requestData['blog_video_link'] = $request->blog_video_link;
        }
        
        $data->fill($requestData);
        $data->save($requestData);
        
        return redirect()->route('blog.index')
        ->with('success','blog updates successfully.');
    }
    
    public  function destroy($id)
    {
        $delete = Blog::find($id)->delete();

        if ($delete) 
        {
           return redirect()->route('blog.index')
        ->with('success','blog deleted successfully.');
        }
    }


    
}
