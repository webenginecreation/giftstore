<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Order;
use App\Admin\Subcategory;
use Session;
use PDF;
use Mail;
use App\Admin\Blog;
use App\Admin\blogCategory;
use App\Admin\Inventory;
use Razorpay\Api\Api;
use View;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Event;
use App\Events\OrderPlacedMail;


class ShoppingController extends Controller
{



    public function index()
    {
        //
        $categories = Category::where('status', '1')->get();
        $subcategories = Subcategory::where('status', '1')->get();

        $products = Product::with('Category', 'subcategory', 'user')->where('status', '1')
            ->paginate(15);

        return view('user.shopping.index', compact('categories', 'products', 'subcategories'));
    }

    public function productFilter(Request $request)
    {

        //dd($request->category);
        if ($request->category == null)
        {
            $allproducts = product::with('category')->where('status', '1')
                ->orderBy('id', 'DESC')
                ->paginate(9);
        }
        else
        {
            $allproducts = Product::with('category')->whereIn('category_id', $request->category)
                ->get();
        }

        $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status', "1")
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();

            
        $Categories = Category::orderBy('id', 'DESC')->get();

        return view('user.product_filter', compact('Categories', 'allproducts', 'latestBlogs'));
    }

    public function getProducsCategoryWise($category_id)
    {
        $allproducts = Product::with('category')->where('category_id', $category_id)->get();
        $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status', "1")
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $Categories = Category::orderBy('id', 'DESC')->get();
        return view('user.product_filter', compact('Categories', 'allproducts', 'latestBlogs'));
    }

    public function search_product(Request $request)
    {

        $query = $request->search;
        $allproducts = Product::with('category')->where('name', 'like', '%' . $query . '%')->orWhere('slug', 'like', '%' . $query . '%')->get();
        //dd($allproducts);
        // $allproducts = Product::with('category')->whereIn('category_id', $request->category)->get();
        $latestBlogs = Blog::with('getAllBlogsWithCategory')->where('status', "1")
            ->orderBy('id', 'DESC')
            ->limit(4)
            ->get();
        $Categories = Category::orderBy('id', 'DESC')->get();
        // //$allproducts = product::with('category')->where('status','1')->orderBy('id', 'DESC')->paginate(9);
        return view('user.product_filter', compact('Categories', 'allproducts', 'latestBlogs'));
    }

    public function addtocart(Request $request)
    {
        $id = $request->product_id;
        $qty = $request->qty;
        $size = $request->size;
        $customtext =  $request->customtext;
        $personalize_image = $request->personalize_image;
        $product = Product::find($id);
        //Price Added as per User Type
        if(Auth::check())
        {
            if(Auth::user()->user_type == "normal")
        {
            $prductcartprice = $product->discount_price;
            
        }
        elseif(Auth::user()->user_type == "reseller")
        {
            $prductcartprice = $product->reseller_price;
            
        }
        elseif(Auth::user()->user_type == "wholeseller")
        {
            $prductcartprice = $product->wholeseller_price;
            
        }    
        }
        else
        {
            $prductcartprice = $product->discount_price;
        }
        
        
        
        if (!$product)
        {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart)
        {

            $cart = [$id => ["id" => $product->id, "name" => $product->name,"size" =>$size , "quantity" => $qty, "price" => $prductcartprice, "photo" => $product->images,"personalize_image" =>$personalize_image,"customtext" =>$customtext, "shipping_charges" => $product->shipping_charges ]];

            session()->put('cart', $cart);
            return json_encode($cart);
        }

        if (isset($cart[$id]))
        {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return json_encode($cart);

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [

        "id" => $product->id, "name" => $product->name,"size" =>$size , "quantity" => $qty, "price" => $prductcartprice, "photo" => $product->images,"personalize_image" =>$personalize_image,"customtext" =>$customtext, "shipping_charges" => $product->shipping_charges];
       session()->put('cart', $cart);
       return json_encode($cart);

    }

    public function updateCart(Request $request)
    {
         //return $request->quantity;
        if ($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;

            session()
                ->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeCart(Request $request)
    {
        //return  $request->id;
       if ($request->id)
        {
            $cart = session()->get('cart');
            if (isset($cart[$request->id]))
            {
                unset($cart[$request->id]);
                session()
                    ->put('cart', $cart);
            }

        $notification = array(
       'message' => 'Product Remove Form Cart!!',
       'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);


           // return session()->flash('success', 'Product removed successfully');
        }
    }

    public function productdetails($slug)
    {
        $products = Product::with('Category')->where('slug', $slug)->where('status', '1')
            ->first();
        // dd($products);
        return view('user.product_details', compact('products'));
    }

    public function cart()
    {
        return view('user.cart');
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function order(Request $request)
    {

        $date = Carbon::now();
        $od = "ORD" . rand();
        $requestData = $request->all();
        $requestData['user_id'] = Auth::user()->id;
        $requestData['order_code'] = $od;
        $requestData['order_products'] = json_encode(session()->get('cart'));
        $requestData['order_date'] = $date->toDateString();
        $requestData['payment'] = 'cod';
        $order = new Order();
        $order->fill($requestData);
        if($order->save($requestData))
        {
            //When want to start Email notification please uncomment below two lines
            $order_code = $od;
            Event::dispatch(new OrderPlacedMail($order_code));
            $updateInventory =  $this->updateInventory(session()->get('cart'));
            Session::forget('cart');
            $notification = array(
            'message' => 'Order Has Been Successfully Placed',
            'alert-type' => 'success');
        return redirect()->route('order.completed')->with($notification);
        }else
        {
              $notification = array(
               'message' => 'Something Went Wrong!',
               'alert-type' => 'error');
           return redirect()->back()->with($notification);
        }
    }
    
    

    public function updateInventory($cart)
    {
        
         foreach ($cart as $key => $value) {
           if(Inventory::where('product_id', '=',$key)->exists())
           {
             $invet =  Inventory::where('product_id', '=', $key)->first();
            return Inventory::where('product_id','=',$key)->update(["quantity" => $invet->quantity - $value['quantity']]);
            }
         }

    }

    public function orderCompleted()
    {
        return view('user.order_completed');
    }
    
    public function paymentFailed()
    {
        return view ('user.payment-failed');
    }

    public function news_letter(Request $request)
    {
        $to_email = $request->email;
        $admin = "noreply@nutriann.com";
        $name="nutriann";
        $data = array("email"=>$to_email,"msg"=>"News letter activated..");
         Mail::send(['html'=>'email.news_mail'],$data, function($message1) use ($name, $to_email) {
                $message1->to($to_email, $name)
                        ->subject('Congratulation');
                $message1->from('noreply@nutriann.com','nutriann');
                });

                 Mail::send(['html'=>'email.admin_news_mail'],$data, function($message1) use ($name, $admin) {
                $message1->to($admin, $name)
                        ->subject('New Email ');
                $message1->from('noreply@nutriann.com','nutriann');
                });
        return redirect()->back()
            ->with('success', 'email send Successfully!!!!');

    }

    public function getInvoice($order_code)
    {
        $preview = Order::where('order_code', $order_code)->first();
        $pdf = PDF::loadView('user.pdf_view', compact('preview'));
        $pdf->download('download.pdf');
        return $pdf->download('download.pdf');
    }
}

