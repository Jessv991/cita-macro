<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\email_service;
use App\Services\email_service_comercial;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //registro del servicio
        $this->app->singleton(email_service::class, function ($app) {
            return new email_service();
        });
        
        $this->app->singleton(email_service_comercial::class, function ($app) {
            return new email_service_comercial();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
