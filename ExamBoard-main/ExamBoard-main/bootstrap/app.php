<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'auth.admin' => \App\Http\Middleware\AuthenticateAdmin::class,
            'auth.student' => \App\Http\Middleware\AuthenticateStudent::class, 
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'guest:admin' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'guest:student' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();