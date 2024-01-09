<?php

namespace App\Providers;

use App\Events\AppointmentDeleteEvent;
use App\Events\ConfirmAppointmentEvent;
use App\Events\CreateAppointmentEvent;
use App\Events\CreatePrescriptionEvent;
use App\Events\CreateUserEvent;
use App\Events\DoctorCreateEvent;
use App\Listeners\changeStatusAppointment;
use App\Listeners\CreatePatientListener;
use App\Listeners\DoctorUserCreate;
use App\Listeners\makePrescriptionPDF;
use App\Listeners\SendEmailConfirmAppointment;
use App\Listeners\SendMailAppointmentCancel;
use App\Listeners\SendMailWelcomeListener;
use App\Listeners\SendNewAppointmentEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CreateUserEvent::class => [
            SendMailWelcomeListener::class,
            CreatePatientListener::class
        ],
        CreateAppointmentEvent::class => [
            SendNewAppointmentEmail::class
        ],
        ConfirmAppointmentEvent::class => [
            SendEmailConfirmAppointment::class
        ],
        DoctorCreateEvent::class => [
            DoctorUserCreate::class
        ],
        CreatePrescriptionEvent::class=>[
            makePrescriptionPDF::class,
            changeStatusAppointment::class,
        ],
        AppointmentDeleteEvent::class=>[
            SendMailAppointmentCancel::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
