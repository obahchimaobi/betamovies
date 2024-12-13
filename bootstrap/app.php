<?php

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\CheckIfUserExistsMiddleware;
use App\Http\Middleware\isLoggedIn;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'auth.user' => AuthMiddleware::class,
            'user.exists' => CheckIfUserExistsMiddleware::class,
            'loggedin' => isLoggedIn::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
