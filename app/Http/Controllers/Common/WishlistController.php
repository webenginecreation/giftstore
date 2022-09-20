<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Wishlist;

class WishlistController extends Controller
{
    //
    public function index()
    {
    	$wishlists = Wishlist::select('wishlist.*','wishlist.id as wishlist_id','products.*')->join('products', 'products.id', '=', 'wishlist.product_id')
                              ->where('wishlist.user_id','=',Auth::user()->id)
    						  ->get();
    						  //dd($wishlists);
        return view('user.wishlists')->with('wishlists',$wishlists);        	
    }

    public function addToWishlist(Request $request)
    {
    	if (Wishlist::where('user_id', '=', $request->user_id)->where('product_id','=',$request->product_id)->count() > 0) {


    		return 409;
  
          }
          else
          {
          		$requestData = $request->all();
                Wishlist::create($requestData);		
          	    return 200;

          }


    }


    public function removeToWishlist($id)
    {

    	$delete = Wishlist::find($id)->delete();

       
        	$notification = array(
       'message' => 'Remove Product in Wishlists',
       'alert-type' => 'success'
        );
           return redirect()->route('my-wishlists')->with($notification);
        
    }

}
