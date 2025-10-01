<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Si el rol del usuario no está en la lista permitida
        if (!in_array($user->rol, $roles)) {
            return $this->redirectBasedOnRole($user);
        }

        return $next($request);
    }

    /**
     * Redirecciona al dashboard según el rol del usuario
     */
    private function redirectBasedOnRole($user)
    {
        return match ($user->rol) {
            'administrador' => redirect()->route('admin.inicio'),
            'tutor'    => redirect()->route('tutor.inicio'),
            'egresado' => redirect()->route('egresado.inicio'),
            'empresa'  => redirect()->route('empresa.inicio'),
            default    => redirect()->route('login')->with('error', 'Rol no válido.'),
        };
    }
}
