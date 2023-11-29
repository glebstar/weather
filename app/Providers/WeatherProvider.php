<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WeatherProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Interfaces\WeatherInterface', 'App\Drivers\OpenWeatherMapDriver');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
