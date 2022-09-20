<?php

namespace App\Listeners;

use App\Events\OrderStatusChangeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Admin\Order;

class OrderStatusChangeMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderStatusChangeMail  $event
     * @return void
     */
    public function handle(OrderStatusChangeMail $event)
    {
        //
            $OrderData = Order::where('order_code','=',$event->order_code)->first();
            $admin_name = "Happiness.gifts";
            $admin_number = "+91 8866174302";
            $admin_email = "noreply@Happiness.gifts";
            $data = array('name'=>$OrderData['order_name'],'status' => $event->status);
            Mail::send(['html'=>'email.order_status_change'],$data, function($message) use ($OrderData) {
                $message->to($OrderData['order_email'], $OrderData['order_name'])
                        ->subject('Order Status');
                $message->from('noreply@happiness.gifts','Happiness.gifts');
            });

    }
}
