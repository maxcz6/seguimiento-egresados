<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    // Formulario para crear un nuevo usuario (admin)
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar un nuevo usuario desde panel admin
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|unique:usuario,usuario',
            'clave'   => 'required|min:6',
            'rol'     => 'required|in:administrador,egresado,tutor,empresa',
            'dni'     => 'nullable|digits:8|unique:usuario,dni',
            'ruc'     => 'nullable|digits:11|unique:usuario,ruc',
        ]);

        Usuario::create([
            'usuario' => $request->usuario,
            'clave'   => Hash::make($request->clave),
            'rol'     => $request->rol,
            'dni'     => $request->rol === 'egresado' ? $request->dni : null,
            'ruc'     => $request->rol === 'empresa' ? $request->ruc : null,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Registro desde formulario público
    public function register(Request $request)
    {
        $rules = [
            'usuario' => 'required|string|max:255|unique:usuario,usuario',
            'rol'     => 'required|in:egresado,empresa',
            'clave'   => 'required|string|min:6|confirmed',
            'dni'     => 'nullable|digits:8|unique:usuario,dni',
            'ruc'     => 'nullable|digits:11|unique:usuario,ruc',
        ];

        // Validación condicional según rol
        if ($request->rol === 'egresado') {
            $rules['dni'] = 'required|digits:8|unique:usuario,dni';
            $rules['ruc'] = 'nullable';
        }

        if ($request->rol === 'empresa') {
            $rules['dni'] = 'required|digits:8|unique:usuario,dni';
            $rules['ruc'] = 'required|digits:11|unique:usuario,ruc';
        }

        $validated = $request->validate($rules);

        $usuario = Usuario::create([
            'usuario' => $validated['usuario'],
            'rol'     => $validated['rol'],
            'clave'   => Hash::make($validated['clave']),
            'dni'     => $validated['dni'] ?? null,
            'ruc'     => $validated['ruc'] ?? null,
        ]);

        Auth::login(user: $usuario);

        return $this->redirectBasedOnRole($usuario);
    }

    // Mostrar usuario
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // Editar usuario
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar usuario
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'usuario' => 'required|unique:usuario,usuario,' . $usuario->id_usuario . ',id_usuario',
            'rol'     => 'required|in:administrador,egresado,tutor,empresa',
            'dni'     => 'nullable|digits:8|unique:usuario,dni,' . $usuario->id_usuario . ',id_usuario',
            'ruc'     => 'nullable|digits:11|unique:usuario,ruc,' . $usuario->id_usuario . ',id_usuario',
        ]);

        $usuario->usuario = $request->usuario;
        $usuario->rol = $request->rol;

        if ($request->filled('clave')) {
            $usuario->clave = Hash::make($request->clave);
        }

        // Asignar DNI/RUC según rol
        $usuario->dni = $request->rol === 'egresado' ? $request->dni : null;
        $usuario->ruc = $request->rol === 'empresa' ? $request->ruc : null;

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    // Redirigir según rol
    private function redirectBasedOnRole($usuario)
    {
        return match ($usuario->rol) {
            'administrador' => redirect()->route('admin.inicio'),
            'tutor'         => redirect()->route('tutor.inicio'),
            'egresado'      => redirect()->route('egresado.inicio'),
            'empresa'       => redirect()->route('empresa.inicio'),
            default         => redirect()->route('login')->with('error', 'Rol no válido.'),
        };
    }
}
