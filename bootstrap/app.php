<?php 

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Middleware por alias
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);

        // 👉 Middleware global para evitar cache del navegador en formularios
        $middleware->web(append: [
            PreventBackHistory::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // 👉 Captura error 419 (token expirado) y redirige al login con mensaje
        $exceptions->render(function (TokenMismatchException $e, Request $request) {
            return redirect()->route('login')
                ->with('error', '⚠️ Tu sesión ha expirado, por favor inicia sesión de nuevo.');
        });
    })
    ->create();
