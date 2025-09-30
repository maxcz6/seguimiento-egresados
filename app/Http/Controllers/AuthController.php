<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\Usuario;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de login
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return view('login'); // resources/views/login.blade.php
    }

    /**
     * Procesa el intento de login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'clave'   => 'required|string',
        ]);

        // ⚠️ Importante: Auth espera "password", pero mapeamos a "clave"
        if (Auth::attempt([
            'usuario'  => $credentials['usuario'],
            'password' => $credentials['clave'],
        ])) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole(Auth::user());
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales proporcionadas no son correctas.',
        ])->withInput($request->except('clave'));
    }

    /**
     * Cierra la sesión del usuario
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Has cerrado sesión correctamente.');
    }

    /**
     * Muestra el formulario de registro
     */
    public function showRegister()
    {
        return view('register'); // resources/views/register.blade.php
    }

    /**
     * Procesa el registro de un nuevo usuario
     */
    public function register(Request $request)
    {
        $request->validate([
            'usuario' => 'required|unique:usuario,usuario',
            'clave'   => 'required|min:6',
            'rol'     => 'required|in:egresado,empresa', // solo permites crear estos roles
        ]);

        $usuario = new Usuario();
        $usuario->usuario = $request->usuario;
        $usuario->clave   = Hash::make($request->clave);
        $usuario->rol     = $request->rol;
        $usuario->save();

        Auth::login($usuario);

        return $this->redirectBasedOnRole($usuario);
    }

    /**
     * Muestra el formulario de recuperar contraseña
     */
    public function showForgot()
    {
        return view('forgot'); // resources/views/forgot.blade.php
    }

    /**
     * Procesa el envío del link de recuperación
     * ⚠️ Necesitas la tabla "password_resets" en tu BD
     */
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string',
        ]);

        $user = Usuario::where('usuario', $request->usuario)->first();

        if (!$user) {
            return back()->withErrors(['usuario' => 'No existe el usuario especificado.']);
        }

        $token = Str::random(60);

        DB::table('password_resets')->insert([
            'email'      => $user->usuario,
            'token'      => $token,
            'created_at' => now(),
        ]);

        return back()->with('status', 'Se generó un enlace de recuperación (deberías enviarlo por correo).');
    }

    /**
     * Redirecciona según el rol del usuario autenticado
     */
    private function redirectBasedOnRole($user)
    {
        return match ($user->rol) {
            'admin'    => redirect()->intended(route('admin.inicio')),
            'tutor'    => redirect()->intended(route('tutor.inicio')),
            'egresado' => redirect()->intended(route('egresado.inicio')),
            'empresa'  => redirect()->intended(route('empresa.inicio')),
            default    => tap(function () {
                Auth::logout();
            }, fn() => redirect()->route('login')->withErrors([
                'rol' => 'Rol de usuario no válido. Contacta al administrador.',
            ])),
        };
    }
}
