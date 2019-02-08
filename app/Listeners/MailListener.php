<?php

namespace App\Listeners;

use App\Events\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail as Meil;
use App\Mail\UserMail;

class MailListener
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
     * @param  Mail  $event
     * @return void
     */
    public function handle(Mail $event)
    {
        Meil::to($event->request->email)->send(New UserMail($event->request));
    }
}
