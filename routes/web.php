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

use App\Http\Controllers\EstudianteController;


// ==========================
// 🔐 AUTENTICACIÓN
// ==========================

// Registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Reset Password
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


// ==========================
// 🏠 REDIRECCIONES BASE
// ==========================

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('home');
})->middleware('auth')->name('dashboard');


// ==========================
// ⚙️ RUTAS PROTEGIDAS POR LOGIN
// ==========================
Route::middleware('auth')->group(function () {

    // CRUD de estudiantes (completo)
    Route::resource('estudiantes', EstudianteController::class);

    // CRUD de todas tus otras entidades
    Route::resources([
        'aulas' => AulaController::class,
        'materias' => MateriaController::class,
        'docentes' => DocenteController::class,
        'reservas' => ReservaController::class,
        'horarios' => HorarioController::class,
        'disponibilidades' => DisponibilidadController::class,
        'focos' => FocoController::class,
        'historialfocos' => HistorialFocoController::class,
        'aireacondicionados' => AireAcondicionadoController::class, // CORREGIDO: singular
        'historialusoaireacondicionados' => HistorialUsoAireAcondicionadoController::class,
        'cortinas' => CortinaController::class,
        'muebles' => MuebleController::class,
        
    ]);

    // Ruta extra opcional
    Route::get('/pokemon', function () {
        return view('pokemon.index');
    })->name('pokemon.index');
});