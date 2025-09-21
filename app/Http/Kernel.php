<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // 
    ];

    protected $middlewareGroups = [
        'web' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'is_admin' => \App\Http\Middleware\IsAdmin::class,
        'is_passenger' => \App\Http\Middleware\IsPassenger::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class
    ];
}
