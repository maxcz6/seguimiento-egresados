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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Formulario de Registro --}}
    <form method="POST" action="{{ route('register') }}" class="login-form">
        @csrf

        {{-- Usuario --}}
        <div class="form-group">
            <input type="text" 
                   name="usuario" 
                   class="form-control @error('usuario') is-invalid @enderror"
                   placeholder="Correo o Usuario"
                   value="{{ old('usuario') }}" 
                   required 
                   autofocus>
            <i class="form-icon fas fa-user"></i>
        </div>

        {{-- Rol --}}
        <div class="form-group">
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror" required>
                <option value="" disabled {{ old('rol') ? '' : 'selected' }}>Seleccione su rol</option>
                <option value="egresado" {{ old('rol') == 'egresado' ? 'selected' : '' }}>Egresado</option>
                <option value="empresa" {{ old('rol') == 'empresa' ? 'selected' : '' }}>Empresa</option>
            </select>
            <i class="form-icon fas fa-user-tag"></i>
        </div>

        {{-- DNI (solo egresado) --}}
        <div class="form-group" id="dniField" style="display: none;">
            <input type="text" name="dni" class="form-control" placeholder="DNI (8 dígitos)" maxlength="8" pattern="[0-9]{8}" value="{{ old('dni') }}">
            <i class="form-icon fas fa-id-card"></i>
        </div>

        {{-- RUC (solo empresa) --}}
        <div class="form-group" id="rucField" style="display: none;">
            <input type="text" name="ruc" class="form-control" placeholder="RUC (11 dígitos)" maxlength="11" pattern="[0-9]{11}" value="{{ old('ruc') }}">
            <i class="form-icon fas fa-building"></i>
        </div>

        {{-- Contraseña --}}
        <div class="form-group">
            <input type="password" name="clave" class="form-control" placeholder="Contraseña (mínimo 6 caracteres)" required minlength="6">
            <i class="form-icon fas fa-lock"></i>
            <i class="form-icon-toggle fas fa-eye" id="togglePassword"></i>
        </div>

        {{-- Confirmar Contraseña --}}
        <div class="form-group">
            <input type="password" name="clave_confirmation" class="form-control" placeholder="Confirmar Contraseña" required minlength="6">
            <i class="form-icon fas fa-lock"></i>
            <i class="form-icon-toggle fas fa-eye" id="togglePasswordConfirm"></i>
        </div>

        {{-- Botón --}}
        <button type="submit" class="login-button">
            <i class="fas fa-user-plus"></i> Registrarse
        </button>
    </form>

    <div class="login-divider">
        <span>o</span>
    </div>

    <footer class="login-footer">
        <p>¿Ya tienes cuenta? <a href="{{ route('login') }}" class="register-link">Iniciar Sesión</a></p>
    </footer>
</div>

{{-- Script dinámico --}}
<script>
document.addEventListener("DOMContentLoaded", function() {
    const rolSelect = document.getElementById("rol");
    const dniField = document.getElementById("dniField");
    const rucField = document.getElementById("rucField");
    const dniInput = document.querySelector('input[name="dni"]');
    const rucInput = document.querySelector('input[name="ruc"]');
    const passwordInput = document.querySelector('input[name="clave"]');
    const passwordConfirmInput = document.querySelector('input[name="clave_confirmation"]');

    // Función mejorada para mostrar/ocultar campos según rol
    function toggleFields() {
        if (rolSelect.value === "egresado") {
            dniField.style.display = "block";
            rucField.style.display = "none";
            dniInput.required = true;
            rucInput.required = false;
            rucInput.value = "";
        } else if (rolSelect.value === "empresa") {
            dniField.style.display = "block";  // Ahora también muestra DNI
            rucField.style.display = "block";  // Muestra RUC
            dniInput.required = true;
            rucInput.required = true;
        } else {
            dniField.style.display = rucField.style.display = "none";
            dniInput.required = rucInput.required = false;
        }
    }

    rolSelect.addEventListener("change", toggleFields);
    toggleFields(); // ejecutar al cargar la página para mantener estado

    // Toggle de contraseña
    document.getElementById("togglePassword").addEventListener("click", function() {
        const type = passwordInput.type === "password" ? "text" : "password";
        passwordInput.type = type;
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });
    document.getElementById("togglePasswordConfirm").addEventListener("click", function() {
        const type = passwordConfirmInput.type === "password" ? "text" : "password";
        passwordConfirmInput.type = type;
        this.classList.toggle("fa-eye");
        this.classList.toggle("fa-eye-slash");
    });

    // Solo números en DNI y RUC
    dniInput.addEventListener("input", () => { dniInput.value = dniInput.value.replace(/[^0-9]/g,''); });
    rucInput.addEventListener("input", () => { rucInput.value = rucInput.value.replace(/[^0-9]/g,''); });

    // Validar coincidencia de contraseñas
    passwordConfirmInput.addEventListener("input", () => {
        passwordConfirmInput.setCustomValidity(passwordConfirmInput.value !== passwordInput.value ? "Las contraseñas no coinciden" : "");
    });
    passwordInput.addEventListener("input", () => {
        if (passwordConfirmInput.value) {
            passwordConfirmInput.setCustomValidity(passwordConfirmInput.value !== passwordInput.value ? "Las contraseñas no coinciden" : "");
        }
    });
});
</script>
@endsection
