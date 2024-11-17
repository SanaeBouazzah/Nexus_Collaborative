<?php

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
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'teacher' => \App\Http\Middleware\Teacher::class,
            'user' => \App\Http\Middleware\User::class,
            'allow.index-only' => \App\Http\Middleware\UserAccess::class,
            'track.visitor' => \App\Http\Middleware\TrackVisitor::class, // Register TrackVisitor middleware
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();