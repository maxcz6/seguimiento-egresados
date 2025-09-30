<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Verifica si el usuario está autenticado y tiene el rol correcto
        if (!Auth::check() || Auth::user()->rol !== $role) {
            return redirect()
                ->route('login')
                ->with('error', '⛔ Acceso denegado. No tienes los permisos necesarios.');
        }

        return $next($request);
    }
}
