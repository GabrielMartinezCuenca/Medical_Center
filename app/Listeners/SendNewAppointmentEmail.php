<?php

namespace App\Listeners;

use App\Mail\NewAppointmentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewAppointmentEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        Mail::to($event -> appointment -> patient -> user -> email)->send(new NewAppointmentMail($event -> appointment));
    }
}
