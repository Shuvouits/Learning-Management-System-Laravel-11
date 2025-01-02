<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

     protected $listen = [
        \App\Events\PaymentSuccessful::class => [
            \App\Listeners\SendPaymentConfirmationEmail::class,
        ],
    ];



    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
