<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        Validator::extend('no_spaces', function ($attribute, $value, $parameters, $validator) {
            return !str_contains($value, ' ');
        });
        if (App::environment('production'))
        {
            URL::forceScheme('https');
        }
    }
}
