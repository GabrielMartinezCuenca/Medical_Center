<?php

namespace App\Listeners;

use App\Models\Patient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePatientListener
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
        Patient::create(
            [
                "name" => $event->user->name,
                "lastname"  => $event->user->lastname,
                "user_id" => $event -> user -> id,
            ]
        );
    }
}
