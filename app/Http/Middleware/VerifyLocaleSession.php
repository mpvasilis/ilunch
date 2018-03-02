<?php

namespace App\Http\Middleware;

use Closure;

class VerifyLocaleSession
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!session()->has('locale')) {
            session()->put('locale', config('app.default_lang'));
        }

        app()->setLocale(session('locale'));
        return $next($request);
    }
}
