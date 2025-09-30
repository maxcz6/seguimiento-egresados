<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Mostrar todos los usuarios.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Formulario para crear un nuevo usuario.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Guardar un nuevo usuario en BD.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario' => 'required|unique:usuario,usuario',
            'clave'   => 'required|min:6',
            'rol'     => 'required|in:admin,egresado,tutor,empresa',
        ]);

        Usuario::create([
            'usuario' => $request->usuario,
            'clave'   => Hash::make($request->clave),
            'rol'     => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Formulario para editar un usuario.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Actualizar un usuario existente.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'usuario' => 'required|unique:usuario,usuario,' . $usuario->id_usuario . ',id_usuario',
            'rol'     => 'required|in:admin,egresado,tutor,empresa',
        ]);

        $usuario->usuario = $request->usuario;
        $usuario->rol     = $request->rol;

        // Cambiar contraseña solo si se envía
        if ($request->filled('clave')) {
            $usuario->clave = Hash::make($request->clave);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
