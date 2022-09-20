<?php

namespace App\Listeners;

use App\Events\OrderPlacedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Admin\Order;
use App\User;
use Mail;


class OrderPlacedMailFired
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
     * @param  OrderPlacedMail  $event
     * @return void
     */
    public function handle(OrderPlacedMail $event)
    {
            $OrderData = Order::where('order_code','=',$event->order_code)->first();
            $admin_name = "Happiness.gifts";
            $admin_number = "+91 8866174302";
            $admin_email = "noreply@Happiness.gifts";
            $data = array('name'=>$OrderData['order_name']);
            Mail::send(['html'=>'email.order_confirm'],$data, function($message) use ($OrderData) {
                $message->to($OrderData['order_email'], $OrderData['order_name'])
                        ->cc(['infobiztria@gmail.com'])
                        ->subject('Order Placed');
                $message->from('noreply@happiness.gifts','Happiness.gifts');
            });

    }
}
