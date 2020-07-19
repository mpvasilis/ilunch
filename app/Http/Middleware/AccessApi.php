<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessApi
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
        if (isset($request->apiKey) || $this->inExceptArray($request)) {
            if ($request->apiKey == config("app.apiKey") || $this->inExceptArray($request)) {
                return $next($request);
            }
            return json_encode(['error' => 'unauthorised', 'message' => 'Wrong apiKey']);
        }
        return json_encode(['error' => 'unauthorised', 'message' => 'apiKey not set']);
    }

    protected function inExceptArray($request)
    {
        foreach ($this->except as $except) {
            if ($except !== '/') {
                $except = trim($except, '/');
            }

            if ($request->is($except)) {
                return true;
            }
        }

        return false;
    }

    protected $except = [
        'api/getMealCalendar',
        'api/secured/getStudentMatches/*',
    ];
}
