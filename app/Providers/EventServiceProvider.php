<?php

namespace App\Providers;

use App\Events\CreateAppointmentEvent;
use App\Events\CreateUserEvent;
use App\Listeners\CreatePatientListener;
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
