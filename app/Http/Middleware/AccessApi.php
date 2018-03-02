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
        if (isset($request->apiKey)) {
            if ($request->apiKey == config("app.apiKey")) {
                return $next($request);
            }
            return json_encode(['error' => 'unauthorised', 'message' => 'Wrong apiKey']);
        }
        return json_encode(['error' => 'unauthorised', 'message' => 'apiKey not set']);
    }
}
