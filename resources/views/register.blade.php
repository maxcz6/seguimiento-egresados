@extends('layouts.auth')

@section('content')
<div class="login-container">
    {{-- Encabezado --}}
    <header class="login-header">
        <div class="login-logo">
            <i class="fas fa-user-plus"></i>
        </div>
        <h1 class="login-title">Crear cuenta</h1>
        <p class="login-subtitle">Complete el formulario para registrarse</p>
    </header>

    {{-- Alertas --}}
    @if (session('error'))
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif

    {{-- Formulario de Registro --}}
    <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf

        <div class="form-group">
            <input type="text" 
                   name="usuario" 
                   id="usuario" 
                   class="form-control"
                   placeholder="Correo o Usuario"
                   value="{{ old('usuario') }}" 
                   required 
                   autofocus>
            <i class="form-icon fas fa-user"></i>
            @error('usuario')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" 
                   name="clave" 
                   id="clave" 
                   class="form-control"
                   placeholder="Contraseña"
                   required>
            <i class="form-icon fas fa-lock"></i>
            <i class="form-icon-toggle fas fa-eye" id="togglePassword"></i>
        </div>

        <div class="form-group">
            <select name="rol" 
                    id="rol" 
                    class="form-control"
                    required>
                <option class="form-controll" value="" disabled selected>Seleccione su rol</option>
                <option class="form-controll" value="egresado">Egresado</option>
                <option class="form-controll" value="empresa">Empresa</option>
            </select>
            <i class="form-icon fas fa-user-tag"></i>
        </div>

        <button type="submit" class="login-button">
            <i class="fas fa-user-plus"></i>
            Registrarse
        </button>
    </form>

    <div class="login-divider">
        <span>o</span>
    </div>

    <footer class="login-footer">
        <p>¿Ya tienes cuenta? 
            <a href="{{ route('login') }}" class="register-link">Iniciar Sesión</a>
        </p>
    </footer>
</div>
@endsection
