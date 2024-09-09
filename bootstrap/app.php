<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // it's weird to use session in API but that's what the requirements are :)
        $middleware->api([\Illuminate\Session\Middleware\StartSession::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
