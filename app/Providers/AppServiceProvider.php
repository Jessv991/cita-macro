<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\email_service;

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
