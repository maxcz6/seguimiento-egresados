@extends('layouts.egresado')

@section('content')
    <h1>Bienvenido, {{ Auth::user()->usuario }}</h1>
    <p>Este es el panel de administración del sistema de seguimiento de egresados.</p>

    <section>
        <h2>Accesos rápidos</h2>
        <ul>
            <li><a href="{{ route('usuarios.index') }}">👥 Gestión de Usuarios</a></li>
            <li><a href="#">📊 Reportes</a></li>
            <li><a href="#">⚙️ Configuración</a></li>
        </ul>
    </section>
@endsection
