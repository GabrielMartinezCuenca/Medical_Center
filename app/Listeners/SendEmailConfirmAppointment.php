<?php

namespace App\Listeners;

use App\Events\ConfirmAppointmentEvent;
use App\Mail\ConfirmAppointmentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailConfirmAppointment
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($event -> appointment -> patient -> user -> email) -> send(new ConfirmAppointmentMail($event -> appointment)); 
    }
}
