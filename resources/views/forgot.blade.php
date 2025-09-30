@extends('layouts.auth')

@section('content')
<div class="login-container">
    {{-- Encabezado --}}
    <header class="login-header">
        <div class="login-logo">
            <i class="fas fa-key"></i>
        </div>
        <h1 class="login-title">Recuperar contraseña</h1>
        <p class="login-subtitle">Ingrese su correo para recibir el enlace</p>
    </header>

    {{-- Alertas --}}
    @if (session('status'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @error('email')
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle"></i>
            <span>{{ $message }}</span>
        </div>
    @enderror

    {{-- Formulario de Recuperación --}}
    <form method="POST" action="{{ route('password.email') }}" class="login-form">
        @csrf

        <div class="form-group">
            <input type="email" 
                   name="usuario" 
                   id="usuario" 
                   class="form-control"
                   placeholder="Correo electrónico"
                   required 
                   autofocus>
            <i class="form-icon fas fa-envelope"></i>
        </div>

        <button type="submit" class="login-button">
            <i class="fas fa-paper-plane"></i>
            Enviar enlace
        </button>
    </form>

    <div class="login-divider">
        <span>o</span>
    </div>

    <footer class="login-footer">
        <p>¿Recordaste tu contraseña? 
            <a href="{{ route('login') }}" class="register-link">Iniciar Sesión</a>
        </p>
    </footer>
</div>
@endsection
