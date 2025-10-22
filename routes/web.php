<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DisponibilidadController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\HistorialFocoController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\HistorialUsoAireAcondicionadoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// ==========================
// 🔐 AUTENTICACIÓN
// ==========================

// Mostrar formulario de registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Procesar registro
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Mostrar formulario de login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// ==========================
// 🏠 REDIRECCIONES BASE
// ==========================

// Si entra a raíz, lo mandamos al login o al dashboard si ya está logueado
Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

// Dashboard principal (lobby / home)
Route::get('/dashboard', function () {
    return view('home');
})->middleware('auth')->name('dashboard');

// ==========================
// ⚙️ RUTAS PROTEGIDAS
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::resources([
        'aulas' => AulaController::class,
        'materias' => MateriaController::class,
        'docentes' => DocenteController::class,
        'reservas' => ReservaController::class,
        'horarios' => HorarioController::class,
        'disponibilidades' => DisponibilidadController::class,
        'focos' => FocoController::class,
        'historialfocos' => HistorialFocoController::class,
        'airesacondicionados' => AireAcondicionadoController::class,
        'historialusoaireacondicionados' => HistorialUsoAireAcondicionadoController::class,
        'cortinas' => CortinaController::class,
        'muebles' => MuebleController::class,
    ]);
});

// ==========================
// 🧩 EJEMPLO OPCIONAL (si querés mantenerlo)
// ==========================
Route::get('/pokemon', function () {
    return view('pokemon.index');
})->middleware('auth')->name('pokemon.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
