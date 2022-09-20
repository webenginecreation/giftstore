<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin\Product;
use Mail;
use App\Admin\Order;

class UserController extends Controller
{
    //
    public function index()
    {
        $myOrders = Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->paginate(5);
    	return view('user.dashboard.my_account',compact('myOrders'));
    }

    public function orders()
    {
        $id = Auth::user()->id;
        //echo $id;
        $order = Order::where('user_id',$id)->get();
        //dd($order);
    	return view ('user.my_order',compact('order'));
    }


    public function manage()
    {
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	return view ('User.manage',compact('user'));
    }

    public function address()
    {
    	return view ('User.address');
    }
    
    public function profile()
    {
        return view('user.profile');
    }
    
    public function reward()
    {
        return view('user.rewards');
    }
    
    
    public function updatePassword(Request $request)
    {
        
        $this->validate($request, [
        'old_password'     => 'required',
        'new_password'     => 'required',
        'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user()->password;
        $id = Auth::user()->id;

        if(!Hash::check($request['old_password'], $user)){

             return back()
                        ->with('error','The specified password does not match the Current password');
        }else
        {
            $data = ["password" => Hash::make($request->new_password)];
           // dd($data);
            User::where(['id'=>$id])->update($data);

            $notification = array(
    'message' => 'Password Changed successfully!',
    'alert-type' => 'success'
);

            return redirect()->back()->with($notification);
        }
    }
    
    public function reset_password($id)
    {
        // $userData = User::where('id', '=', base64_decode($id))->get();
        
        // dd($userData);
        $id = base64_decode($id);
        return view('email.reset_password',compact('id'));
    }
    
    public function change_password(Request $request, $id)
    {
        $this->validate($request, [
        
        'password'     => 'required',
        'confirm_password' => 'required|same:password',
        ]);
        
        $data = 
               [
                    "password" => Hash::make($request->password),
                ];

            User::where(['id'=>$id])->update($data);
            return redirect()->route('user-login')->with('success','The  password change successfully!!!');
        
    }
    
    public function profileUpdate(Request $request)
    {
    	$id = Auth::user()->id;
        
    	$user = User::find($id);
        $requestData = $request->all();
        $user->fill($requestData);
        $user->save($requestData);

        $notification = array(
       'message' => 'Profile Updated',
       'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
    
    public function forgotPassword(Request $request)
    {
        
        if (User::where('email', '=', $request->email)->exists()) 
        {
          
            $userData = User::where('email', '=', $request->email)->get();
            
            $name = $userData[0]->name;
            $email = $userData[0]->email;
            $id = base64_encode($userData[0]->id);
            $data = array('name'=>$name, "email"=>$email,"reset"=>"http://nutriann.com.viralcreators.co/reset-password/$id");
            
            Mail::send(['html'=>'email.forgot_email'],$data, function($message)use ($name, $email)  {
                $message->to($email, $name)
                        ->subject('Reset Password');
                $message->from('nutriann@viralcreators.co','Admin');
            });
            
            return back()->with('success','Check in you mail-box and reset your password!!!!');
            
        }else
        {
           return back()->with('error','Email is not Registred!!!');
        }
        
    }


    public function cancleOrder($order_code)
    {
       $CancleOrder = Order::where('order_code',$order_code)->update(["status" =>"Cancle"]);
       return redirect()->back()->with('success','Order Cancel Succesfull');     
    }

    public function billingAddressUpdate(Request $request)
    {
         $data = User::find(Auth::user()->id);
         $requestData = $request->all();
         //dd($requestData);
         $data->fill($requestData);
         $data->save($requestData);

         $notification = array(
    'message' => 'Blling  Address Updated',
    'alert-type' => 'success'
);

            return redirect()->back()->with($notification);

        
       


    }


     public function shippingAddressUpdate(Request $request)
    {
         $data = User::find(Auth::user()->id);
         $requestData = $request->all();
         $data->fill($requestData);
         $data->save($requestData);
          $notification = array(
    'message' => 'Shipping Address Updated',
    'alert-type' => 'success'
);

            return redirect()->back()->with($notification);

    }

    public function userProfileUpdate(Request $request)
    {
         $data = User::find(Auth::user()->id);
         $requestData = $request->all();
         //dd($requestData);
         $data->fill($requestData);
         $data->save($requestData);

          $notification = array(
       'message' => 'Profile Updated',
       'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function viewOrder($order_code)
    {
        $orderDetails = Order::where('order_code',$order_code)->first();

        return view('user.invoice',compact('orderDetails'));
    
    }
    
    public function changeUserType($id,$user_type)
    {
        $user = User::whereId($id)->update(["user_type" => $user_type]);
        return redirect()->back();
    }
    
   
}
