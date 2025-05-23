<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\VerifyLocaleSession::class,
            \App\Http\Middleware\ViewShares::class,
            'maintainSchedule'
        ],

        'api' => [
            \App\Http\Middleware\ApiShares::class,
            'accessApi',
            'throttle:60,1',
            'bindings',
        ],

        'session'=>[
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Session\Middleware\StartSession::class,
        ],
    ];

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\VerifyLocaleSession::class,
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'maintainSchedule' => \App\Http\Middleware\MaintainSchedule::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'accessApi' => \App\Http\Middleware\AccessApi::class,
        'can_view_student' => \App\Http\Middleware\AccessStudentProfile::class,
        'admin_panel' => \App\Http\Middleware\AccessAdminPanel::class,
        'access_administrator' => \App\Http\Middleware\AccessAdminOnly::class,
        'access_student_care' => \App\Http\Middleware\AccessAdminStudentCare::class,
        'access_staff' => \App\Http\Middleware\AccessAdminStaff::class,
        'cas.auth'  => Subfission\Cas\Middleware\CASAuth::class,
        'cas.guest' => Subfission\Cas\Middleware\RedirectCASAuthenticated::class,
    ];
}
