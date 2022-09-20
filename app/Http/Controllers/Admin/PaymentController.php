<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use App\Admin\Order;
use Session;
use App\Admin\Inventory;
use App\User;
use Carbon\Carbon;
use Event;
use App\Events\OrderPlacedMail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    //
    private $razorpayId = "rzp_live_q2840TEKSuC6T4";
    private $razorpayKey = "LaN6lIu7OHbl2Tqe25JKg3wI";

    public function Initiate(Request $request)
    {
        // Generate random receipt id
        $receiptId = Str::random(20);
        
        // Create an object of razorpay
        $api = new Api($this->razorpayId, $this->razorpayKey);

        // In razorpay you have to convert rupees into paise we multiply by 100
        // Currency will be INR
        // Creating order
        $order = $api->order->create(array(
            'receipt' => $receiptId,
            'amount' => $request->all()['total_amount'] * 100,
            'currency' => 'INR'
            )
        );

        // Return response on payment page
        $response = [
            'orderId' => $order['id'],
            'razorpayId' => $this->razorpayId,
            'total_amount' => $request->all()['total_amount'],
            'order_name' => $request->all()['order_name'],
            'order_lastname' => $request->all()['order_lastname'],
            'currency' => 'INR',
            'order_email' => $request->all()['order_email'],
            'order_phone' => $request->all()['order_phone'],
            'city' => $request->all()['city'],
            'state' => $request->all()['state'],
            'order_zip' => $request->all()['order_zip'],
            'order_address' => $request->all()['order_address'],
            'order_address2' => $request->all()['order_address2'],
            'order_notes' => $request->all()['order_notes'],
            'description' => "Secure Payment With Razorpay Don't Refresh page let complete Process",
        ];

        // Let's checkout payment page is it working
        return view('user.payment',compact('response'));
    }
    
    public function Complete(Request $request)
{
    // Now verify the signature is correct . We create the private function for verify the signature
        $signatureStatus = $this->SignatureVerify(
        $request->all()['rzp_signature'],
        $request->all()['rzp_paymentid'],
        $request->all()['rzp_orderid']
    );

    // If Signature status is true We will save the payment response in our database
    // In this tutorial we send the response to Success page if payment successfully made
    if($signatureStatus == true)
    {
        $date = Carbon::now();
        $requestData = $request->all();
        $requestData['user_id'] = Auth::user()->id;
        $requestData['order_products'] = json_encode(session()->get('cart'));
        $requestData['order_date'] = $date->toDateString();
        $requestData['payment'] = 'online';
        $order = new Order();
        $order->fill($requestData);
        if($order->save($requestData))
        {
            //When want to start Email notification please uncomment below two lines
            $order_code = $request->order_code;
            Event::dispatch(new OrderPlacedMail($order_code));
            $updateInventory =  $this->updateInventory(session()->get('cart'));
            
            Session::forget('cart');
            $arr = array(
            'msg' => 'Payment successfully credited',
            'status' => true
        );
        
        return redirect()->route('order.completed')->with($arr);
        } 
        else
        {
              $notification = array(
               'message' => 'Something Went Wrong!',
               'alert-type' => 'error');
           return redirect()->back()->with($notification);
        }
    }
    else{
        // You can create this page
         return view ('user.payment-failed');
    }
}

// In this function we return boolean if signature is correct
private function SignatureVerify($_signature,$_paymentId,$_orderId)
{
    try
    {
        // Create an object of razorpay class
        $api = new Api($this->razorpayId, $this->razorpayKey);
        $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
        $order  = $api->utility->verifyPaymentSignature($attributes);
        return true;
    }
    catch(\Exception $e)
    {
        // If Signature is not correct its give a excetption so we use try catch
        return false;
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
}
