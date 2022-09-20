<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Mail;
use Event;
use App\Events\SendMail;
class UserLoginController extends Controller
{
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 2; // Default is 1
    
    public function index()
    {
    	return view('user.login');
    }

    public function signUp()
    {
        return view('user.signup');
    }

     public function registration(Request $request)
    {   
        //dd($request->all());

        $validatedData = $request->validate([
        	'name' => 'required|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6',
            'mobile' => 'required|unique:users|max:10|min:10',
        ]);
        
        $requestData = $request->all();
        $requestData['role'] = '2';	
        $requestData['status'] = '1';
        $requestData['password'] = Hash::make($request->password);	
        User::create($requestData);

        //This Event for the mail sent purpose 
        $to_email = $requestData['email'];
        Event::dispatch(new SendMail($to_email));

            //Dharam Code
            // $admin_name = "Biztria";
            // $admin_number = "8866174302";
            // $admin_email = "noreply@biztria.com";
            // $to_name = $requestData['name'];
            // $to_email = $requestData['email'];
            // $data = array('name'=>$to_name);
                
        
                
            // Mail::send(['html'=>'email.new_email'],$data, function($message) use ($to_name, $to_email) {
            //     $message->to($to_email, $to_name)
            //             ->subject('Welcome');
            //     $message->from('noreply@biztria.com','Biztria');
            // });

        //End of Dharam Code
           return redirect()->route('login')->with('message','Thank you for being awesome!! Your Account has been created..')->with('class','alert alert-success');
       

       }



    public function authanticate(Request $request)
     {

        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
            $remember_me = $request->has('remember_me') ? true : false; 

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role'=> '2','status' => '1'], $remember_me)) {
            
            if(session('cart'))
            {
                return redirect()->route('show.cart');
            }
            else
            {
                 return redirect()->intended('dashboard');
            }
         
         }
         else
         {
            return redirect()->back()->with('message',"Sorry, We couldn't find an account with that Email OR Password")->with('class','alert alert-danger');
         }

    }
    
    public function logout()
    {
        Auth::logout();

$notification = array(
       'message' => 'Logout Successfully',
       'alert-type' => 'error'
        );

        return redirect('user/login')->with($notification)->with('message',"Logout Successfully")->with('class','alert alert-success');


        // return redirect('user/login')->with('message',"Logout Successfully")->with('class','alert alert-success');

       }
       
        public function forgetPassword()
    {
     return view('user.forget_password');   
    }

}
