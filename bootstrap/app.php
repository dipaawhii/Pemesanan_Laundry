<?php

use App\Http\Middleware\AdministratorAccess;
use App\Http\Middleware\KaryawanAccess;
use App\Http\Middleware\MemberAccess;
use App\Http\Middleware\SupervisiAccess;
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
            'administratorAccess' => AdministratorAccess::class,
            'karyawanAccess' => KaryawanAccess::class,
            'supervisiAccess' => SupervisiAccess::class,
            'memberAccess' => MemberAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
