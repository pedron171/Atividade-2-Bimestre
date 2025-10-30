<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * 
     *
     * @var array<class-string
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * 
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * 
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
