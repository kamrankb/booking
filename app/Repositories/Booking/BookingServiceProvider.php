<?php

namespace App\Repositories\Booking;

use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Booking\BookingInterface', 'App\Repositories\Booking\BookingRepository');
    }
}