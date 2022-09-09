<?php

namespace App\Listeners;

use App\Events\OrderRegistered;
use App\Mail\OrderConfirmationToManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailOrderRegisteredToManager
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
     * @param  \App\Events\OrderRegistered  $event
     * @return void
     */
    public function handle(OrderRegistered $event)
    {
        Mail::send(new OrderConfirmationToManager($event->user, $event->order));
    }
}
