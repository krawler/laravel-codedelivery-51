<?php

namespace CodeDelivery\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
<<<<<<< HEAD
=======
     * These middleware are run during every request to your application.
     *
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
<<<<<<< HEAD
        \CodeDelivery\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      //  \CodeDelivery\Http\Middleware\VerifyCsrfToken::class,
        \LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware::class,
        \Barryvdh\Cors\HandleCors::class,
=======
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \CodeDelivery\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \CodeDelivery\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    ];

    /**
     * The application's route middleware.
     *
<<<<<<< HEAD
=======
     * These middleware may be assigned to groups or used individually.
     *
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \CodeDelivery\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
<<<<<<< HEAD
        'guest' => \CodeDelivery\Http\Middleware\RedirectIfAuthenticated::class,
        'auth.checkrole' => \CodeDelivery\Http\Middleware\CheckRole::class,
        'oauth.checkrole' => \CodeDelivery\Http\Middleware\OAuthCheckRole::class,
        'oauth' => \LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware::class,
        'oauth-user' => \LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware::class,
        'oauth-client' => \LucaDegasperi\OAuth2Server\Middleware\OAuthClientOwnerMiddleware::class,
        'check-authorization-params' => \LucaDegasperi\OAuth2Server\Middleware\CheckAuthCodeRequestMiddleware::class,
        'cors' => \CodeDelivery\Http\Middleware\Cors::class,
=======
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \CodeDelivery\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
>>>>>>> 8338ce9c3cd850f2215745648192ff978e4be93f
    ];
}
