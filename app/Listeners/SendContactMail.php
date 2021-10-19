<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendContactMail implements ShouldQueue
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
     * @param  NewClientContacted  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;   
        Mail::send('emails.contact', ['user' => $user], function ($message) use ($user) {
            $message->from('standingdeskhp@gmail.com', 'Van Long Plastic');
            $message->subject('Cảm ơn quý khách đã quan tâm đến sản phẩm nhựa Vân Long');
            $message->to($user->email , $user->name);
        });
    }
}
