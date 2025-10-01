<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\EgresadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🌐 Página principal (pública)
Route::get('/', function () {
    return view('index');
})->name('index');

// 🔐 Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/forgot-password', [AuthController::class, 'showForgot'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

// 👨‍💻 ADMIN
Route::prefix('admin')->middleware(['auth', 'role:administrador'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.inicio');
    Route::get('/inicio', fn() => view('admin.inicio'))->name('admin.inicio.view');
    Route::get('/usuarios', fn() => view('admin.usuarios'))->name('admin.usuarios');
    Route::get('/egresados', fn() => view('admin.egresados'))->name('admin.egresados');
    Route::get('/seguimiento-laboral', fn() => view('admin.seguimiento-laboral'))->name('admin.seguimientoLaboral');
    Route::get('/seguimiento-academico', fn() => view('admin.seguimiento-academico'))->name('admin.seguimientoAcademico');
    Route::get('/encuestas', fn() => view('admin.encuestas'))->name('admin.encuestas');
    Route::get('/reportes', fn() => view('admin.reportes'))->name('admin.reportes');
    Route::get('/configuracion', fn() => view('admin.configuracion'))->name('admin.configuracion');
});

// 🎓 TUTOR
Route::prefix('tutor')->middleware(['auth', 'role:tutor'])->group(function () {
    Route::get('/', [TutorController::class, 'index'])->name('tutor.inicio');
    Route::get('/inicio', fn() => view('tutor.inicio'))->name('tutor.inicio.view');
    Route::get('/egresados', fn() => view('tutor.egresados'))->name('tutor.egresados');
    Route::get('/seguimiento-laboral', fn() => view('tutor.seguimiento-laboral'))->name('tutor.seguimientoLaboral');
    Route::get('/seguimiento-academico', fn() => view('tutor.seguimiento-academico'))->name('tutor.seguimientoAcademico');
    Route::get('/encuestas', fn() => view('tutor.encuestas'))->name('tutor.encuestas');
    Route::get('/reportes', fn() => view('tutor.reportes'))->name('tutor.reportes');
});

// 🎓 EGRESADO
Route::prefix('egresado')->middleware(['auth', 'role:egresado'])->group(function () {
    Route::get('/', [EgresadoController::class, 'index'])->name('egresado.inicio');
    Route::get('/inicio', fn() => view('egresado.inicio'))->name('egresado.inicio.view');
    Route::get('/perfil', fn() => view('egresado.perfil'))->name('egresado.perfil');
    Route::get('/misSeguimientos', fn() => view('egresado.misSeguimientos'))->name('egresado.misSeguimientos');
    Route::get('/encuestas', fn() => view('egresado.encuestas'))->name('egresado.encuestas');
    Route::get('/reportes', fn() => view('egresado.reportes'))->name('egresado.reportes');
    Route::get('/oportunidades', fn() => view('egresado.oportunidades'))->name('egresado.oportunidades'); 
});

// 🏢 EMPRESA
Route::prefix('empresa')->middleware(['auth', 'role:empresa'])->group(function () {
    Route::get('/', [EmpresaController::class, 'index'])->name('empresa.inicio');
    Route::get('/inicio', fn() => view('empresa.inicio'))->name('empresa.inicio.view');
    Route::get('/egresados', fn() => view('empresa.egresados'))->name('empresa.egresados');
    Route::get('/seguimiento-laboral', fn() => view('empresa.seguimiento-laboral'))->name('empresa.seguimientoLaboral');
    Route::get('/seguimiento-academico', fn() => view('empresa.seguimiento-academico'))->name('empresa.seguimientoAcademico');
    Route::get('/encuestas', fn() => view('empresa.encuestas'))->name('empresa.encuestas');
    Route::get('/reportes', fn() => view('empresa.reportes'))->name('empresa.reportes');
});

// 👥 Gestión de usuarios (CRUD) - accesible solo a autenticados
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('usuarios', UsuarioController::class);
});
