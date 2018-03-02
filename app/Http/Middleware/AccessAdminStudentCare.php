<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessAdminStudentCare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check() && in_array(Auth::user()->role, ["ADMINISTRATOR", "STUDENT_CARE"])) {
            return $next($request);
        }
        return redirect('/unauthorised');
    }
}
