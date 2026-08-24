<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\NepaliDateHelper;

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
        // Register Nepali date helper functions for Blade templates
        if (!function_exists('nepaliToday')) {
            function nepaliToday()
            {
                return NepaliDateHelper::getNepaliToday();
            }
        }

        if (!function_exists('englishToday')) {
            function englishToday()
            {
                return NepaliDateHelper::getEnglishToday();
            }
        }
    }
}
