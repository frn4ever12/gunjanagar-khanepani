<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        } else {
            // Set default locale to Nepali if not in session
            session()->put('locale', 'ne');
            App::setLocale('ne');
        }
        return $next($request);
    }
}
