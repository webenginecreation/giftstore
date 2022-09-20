<?php

namespace App\Listeners;

use App\Events\SendMail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\User;
use Mail;

class SendMailFired
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
     * @param  SendMail  $event
     * @return void
     */
    public function handle(SendMail $event)
    {
        //
        $user = User::where('email','=',$event->to_email)->first();

        // Mail::send('emails.mailEvent', $user, function($message) use ($user) {
        //     $message->to('trupnil92@gmail.com');
        //     $message->subject('Event Testing');
        // });

            $admin_name = "Latastore";
            $admin_number = "8866174302";
            $admin_email = "noreply@larastore.ml";
            //$to_name = 'TRUPS';
            //$to_email ='trupnil92@gmail.com';
            $data = array('name'=>$user['name']);
                
        
                
            Mail::send(['html'=>'email.new_email'],$data, function($message) use ($user) {
                $message->to($user['email'], $user['name'])
                        ->subject('Welcome');
                $message->from('noreply@happiness.gifts','Happiness.gifts');
            });
    }
}
