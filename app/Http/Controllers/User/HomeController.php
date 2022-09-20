<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Blog;
use App\Admin\blogCategory;
use Illuminate\Support\Str;
use View;
use App\Admin\Offers;
use App\Admin\OffersProducts;
use App\Admin\Slider;
use App\Admin\Brand;
use Event;
use App\Events\SendMail;

class HomeController extends Controller
{
   
    public function eventCall()
    {
       Event::dispatch(new SendMail('trupnil92@gmail.com'));
    }
   
    public function index()
    {

        $Banners = Slider::orderBy('position', 'ASC')->get();
        $getAllOffersWithProducts = 
                   OffersProducts::select('offers_products.*','offers.*','products.category_id','products.id','products.name','products.slug','products.images','products.base_price','products.discount_price','products.reseller_price','products.wholeseller_price','products.size','products.product_link','products.stock_status','products.images_allowed','products.text_allowed')
                   ->join('offers', 'offers_products.offers_id', '=', 'offers.id')
                   ->join('products', 'offers_products.product_id', '=', 'products.id')
                   ->get();
        // $getAllOffersWithProducts = 
        //            OffersProducts::join('offers', 'offers_products.offers_id', '=', 'offers.id')
        //            ->join('products', 'offers_products.product_id', '=', 'products.id')
        //            ->get();
        $grouped = $getAllOffersWithProducts->groupBy('offers_name');
        //$brands = Brand::select('id','brand_name','brand_icon')->get();
        return view('user.index',compact('grouped','Banners'));
    }
    
     public function showAllProducts($category_id = null)
    {
        if($category_id !== null)
        {
            $allproducts = product::select('products.category_id','products.id','products.name','products.slug','products.images','products.base_price','products.discount_price','products.size','products.product_link','products.stock_status','products.Short_details','products.images_allowed','products.text_allowed','products.reseller_price','products.wholeseller_price')->with('category')->where('category_id',$category_id)->where('status','1')->orderBy('id', 'DESC')->paginate(9);    
        }
        else
        {
            $allproducts = product::select('products.category_id','products.id','products.name','products.slug','products.images','products.base_price','products.discount_price','products.size','products.product_link','products.stock_status','products.Short_details','products.images_allowed','products.text_allowed','products.reseller_price','products.wholeseller_price')->with('category')->where('status','1')->orderBy('id', 'DESC')->paginate(9);
        }

       // dd($allproducts);
        $recentPosts = Blog::with('getAllBlogsWithCategory')->orderBy('id','DESC')->limit(3)->get();
       return view('user.products',compact('allproducts','recentPosts'));
    }
    
    public function details($slug)
    {
       $productDetails = product::with('category')->with('brand')->where('slug',$slug)->where('status','1')->first();
       $getRelatedProducts =  product::with('category')->where('category_id',$productDetails->category_id)->where('status','1')->orderBy('id', 'DESC')->get();
       //dd($productDetails->discount_price);
       return view('user.details',compact('productDetails','getRelatedProducts'));
    }
    
     
    public function blogs()
    {
        $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        $getAllBlogs =   Blog::with('getAllBlogsWithCategory')->where('status',"1")->orderBy('id', 'DESC')->paginate(3);
        return view('user.blogs',compact('getAllBlogs','BlogCategories'));
    }
    
    
    public function blogDetails($slug)
    {
        $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
        
        $getBlog =   Blog::with('getAllBlogsWithCategory')->where('blog_slug',$slug)->first();
        return view('user.blog_details',compact('getBlog','BlogCategories'));
    }
    
    public function getBlogAccordingCategory($id)
    {
         $BlogCategories = blogCategory::orderBy('id', 'DESC')->get();
         $getAllBlogs =   Blog::with('getAllBlogsWithCategory')->where('status',"1")->where('blog_category_id',$id)->orderBy('id', 'DESC')->paginate(3);        
         return view('user.category_blogs',compact('getAllBlogs','BlogCategories'));
    }
    
   

    public function search(Request $request){
    // Get the search value from the request
    $search = $request->input('search');
    // Search in the title and body columns from the posts table
    $allproducts = Product::with('category')
        ->where('tags', 'LIKE', "%$search%")
        ->orWhere('name', 'LIKE', "%$search%")
        ->paginate(9);
        $recentPosts = Blog::with('getAllBlogsWithCategory')->orderBy('id','DESC')->limit(3)->get();
        return view('user.products',compact('allproducts','recentPosts'));
    }


public function showAllCategories()
{
    
    return view('user.allcategories');
}

public function about()
{
    return view('user.about');
}

public function contact()
{
    return view('user.contact');
}

public function sitemap()
{
        
        $getAllBlogs =   Blog::with('getAllBlogsWithCategory')->where('status',"1")->orderBy('id', 'DESC')->paginate(3);
        $getAllProducts= Product::where('status',"1")->get();

        return response()->view('user.sitemap',['getAllBlogs' => $getAllBlogs,"getAllProducts"=>$getAllProducts])->header('Content-Type','text/xml');
}

public function reseller()
{
    return view('user.reseller');
}

  
    
}
