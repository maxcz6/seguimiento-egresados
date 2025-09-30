@extends('layouts.auth')

@section('content')
<div class="login-container">
    
    {{-- Encabezado --}}
    <header class="login-header text-center">
        <div class="login-logo">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <h1 class="login-title">Bienvenido</h1>
        <p class="login-subtitle">Accede a tu cuenta para continuar</p>
    </header>

    {{-- Alertas --}}
    <div class="login-alerts">
        @if (session('error'))
            <div class="alert alert-danger d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if (session('message'))
            <div class="alert alert-success d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <span>{{ session('message') }}</span>
            </div>
        @endif
    </div>

    {{-- Formulario de Login --}}
    <form method="POST" action="{{ route('login') }}" class="login-form" id="loginForm">
        @csrf

        {{-- Usuario --}}
        <div class="form-group position-relative">
            <input type="text"
                   name="usuario"
                   id="usuario"
                   class="form-control"
                   placeholder="Correo electrónico"
                   value="{{ old('usuario') }}"
                   required
                   autofocus
                   aria-label="Correo electrónico">
            <i class="form-icon fas fa-user"></i>
            @error('usuario')
                <span class="form-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- Contraseña --}}
        <div class="form-group position-relative">
            <input type="password"
                   name="clave"
                   id="clave"
                   class="form-control"
                   placeholder="Contraseña"
                   required
                   aria-label="Contraseña">
            <i class="form-icon fas fa-lock"></i>
            <i class="form-icon-toggle fas fa-eye" id="togglePassword" role="button" aria-label="Mostrar/Ocultar contraseña"></i>
        </div>

        {{-- Opciones extra --}}
        <div class="form-options d-flex justify-content-between align-items-center">
            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember" class="form-checkbox">
                <label for="remember" class="form-label">Recordarme</label>
            </div>
            <a href="{{ route('password.request') }}" class="forgot-link">
                ¿Olvidaste tu contraseña?
            </a>
        </div>

        {{-- Botón de envío --}}
        <button type="submit" class="login-button w-100">
            <i class="fas fa-sign-in-alt me-1"></i>
            Iniciar Sesión
        </button>
    </form>

    {{-- Divider --}}
    <div class="login-divider">
        <span>o</span>
    </div>

    {{-- Footer --}}
    <footer class="login-footer text-center">
        <p>¿No tienes cuenta? 
            <a href="{{ route('register') }}" class="register-link">Crear cuenta</a>
        </p>
    </footer>
</div>
@endsection
