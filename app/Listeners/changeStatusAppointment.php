<?php

namespace App\Listeners;

use App\Models\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class changeStatusAppointment
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
        $request = Request::find($event->appointment->id);
        $request -> update(["status"=> 3]);
    }
}
