<?php

namespace App\Listeners;

use App\Mail\CreateDoctorMail;
use App\Models\Doctor;
use App\Models\Validations_User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Str;
use DateTime;
use DateInterval;
class DoctorUserCreate
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
        $password = Str::random(8);
        $token = Str::random(32);

       $user = User::create(
            [
                'name' => $event -> doctor -> name,
                'lastname' => $event -> doctor -> lastname,
                'email' => $event -> doctor -> email,
                'phone' => $event -> doctor -> phone,
                'password' => $password,

            ]
        )->assignRole('medico');

        $doctor = Doctor::find($event -> doctor -> id);
        $doctor -> update(
            [
                'user_id' => $user -> id,
            ]
        );

        Validations_User::create([
            'user_id' => $user->id,
            'token' => $token,
            'date_start' => (new DateTime())->format('Y-m-d H:i:s'),
            'expiration_date' => (new DateTime())->add(new DateInterval('P10D'))->format('Y-m-d H:i:s'),
        ]);
        Mail::to($event->doctor->email)->send(new CreateDoctorMail($user, $token));


    }
}
