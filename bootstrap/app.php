<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CorsMiddleware; // Asegúrate de importar tu middleware CORS

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Es crucial definir las rutas API para que el middleware actúe sobre ellas
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Añadir CorsMiddleware al grupo 'api' para que solo afecte tus rutas de la API
        $middleware->api(prepend: [
            CorsMiddleware::class,
        ]);

        // Tus alias de middleware existentes
        $middleware->alias([
            'superadmin' => \App\Http\Middleware\IsSuperAdmin::class,
            'admin'      => \App\Http\Middleware\IsAdmin::class,
            'student'    => \App\Http\Middleware\IsStudent::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();