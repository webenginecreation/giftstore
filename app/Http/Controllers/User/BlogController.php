<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Blog;
use App\Admin\blogCategory;
class BlogController extends Controller
{
    //
    
    public function index($id = "")
    {
    	$blogCategories = blogCategory::all();	
    	if($id == "")
    	{
    		$getAllBlogsWithCategory = Blog::with('getAllBlogsWithCategory')->paginate(9);
    	}
    	else
    	{
    		$getAllBlogsWithCategory = Blog::with('getAllBlogsWithCategory')->where('blog_category_id','=',$id)->paginate(9);
    	}
    	$recentPosts = Blog::with('getAllBlogsWithCategory')->orderBy('id','DESC')->limit(3)->get();
    	return view('user.blogs.index',compact('blogCategories','getAllBlogsWithCategory','recentPosts'));
    }

    public function blogDetails($slug)
    {
    	$blogCategories = blogCategory::all();
    	$getBlogsWithCategory = Blog::with('getAllBlogsWithCategory')->where('blog_slug','=',$slug)->first();
    	$recentPosts = Blog::with('getAllBlogsWithCategory')->orderBy('id','DESC')->limit(3)->get();
        return view('user.blogs.details',compact('blogCategories','getBlogsWithCategory','recentPosts'));
    }
}
