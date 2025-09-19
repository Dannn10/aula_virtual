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

Route::get('/', function () {
    return view('home'); // página principal
})->name('home');   // ✅ agregado el nombre de la ruta

Route::get('/pokemon', function () {
    return view('pokemon.index');
})->name('pokemon.index');

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
