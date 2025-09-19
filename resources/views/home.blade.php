@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f8f9fa, #e3f2fd);
    }
    .card {
        border-radius: 1rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }
    .card-title {
        font-weight: bold;
        color: #0d47a1;
    }
    .btn-custom {
        border-radius: 30px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .btn-custom:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }
    .header-title {
        font-weight: 700;
        color: #0d47a1;
    }
    .header-sub {
        color: #555;
    }
</style>

<div class="container">
    <!-- Header -->
    <div class="text-center mb-5">
        <h1 class="header-title display-5">🌟 Bienvenido al Aula Virtual</h1>
        <p class="header-sub fs-5">Gestioná fácilmente aulas, materias, docentes, reservas y más.</p>
    </div>

    <!-- Grid de opciones -->
    <div class="row g-4">
        <!-- Aulas -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Aulas</h5>
                    <p class="text-muted small">Administrá las aulas disponibles</p>
                    <a href="{{ route('aulas.index') }}" class="btn btn-custom w-100" style="background:#42a5f5; color:white;">Ingresar</a>
                </div>
            </div>
        </div>

        <!-- Materias -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Materias</h5>
                    <p class="text-muted small">Organizá las materias del ciclo</p>
                    <a href="{{ route('materias.index') }}" class="btn btn-custom w-100" style="background:#66bb6a; color:white;">Ingresar</a>
                </div>
            </div>
        </div>

        <!-- Docentes -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Docentes</h5>
                    <p class="text-muted small">Gestioná los docentes asignados</p>
                    <a href="{{ route('docentes.index') }}" class="btn btn-custom w-100" style="background:#ab47bc; color:white;">Ingresar</a>
                </div>
            </div>
        </div>

        <!-- Reservas -->
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Reservas</h5>
                    <p class="text-muted small">Controlá las reservas de aulas</p>
                    <a href="{{ route('reservas.index') }}" class="btn btn-custom w-100" style="background:#ef5350; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Segunda fila -->
    <div class="row g-4 mt-2">
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Horarios</h5>
                    <p class="text-muted small">Planificá horarios de clases</p>
                    <a href="{{ route('horarios.index') }}" class="btn btn-custom w-100" style="background:#29b6f6; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Disponibilidades</h5>
                    <p class="text-muted small">Verificá disponibilidades</p>
                    <a href="{{ route('disponibilidades.index') }}" class="btn btn-custom w-100" style="background:#8d6e63; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Focos</h5>
                    <p class="text-muted small">Encendido y control de focos</p>
                    <a href="{{ route('focos.index') }}" class="btn btn-custom w-100" style="background:#fbc02d; color:black;">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Historial Focos</h5>
                    <p class="text-muted small">Registro de focos usados</p>
                    <a href="{{ route('historialfocos.index') }}" class="btn btn-custom w-100" style="background:#5c6bc0; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tercera fila -->
    <div class="row g-4 mt-2">
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Aires Acond.</h5>
                    <p class="text-muted small">Control de aires acondicionados</p>
                    <a href="{{ route('airesacondicionados.index') }}" class="btn btn-custom w-100" style="background:#26a69a; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Historial Aires</h5>
                    <p class="text-muted small">Uso de aires acondicionados</p>
                    <a href="{{ route('historialusoaireacondicionados.index') }}" class="btn btn-custom w-100" style="background:#d32f2f; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Cortinas</h5>
                    <p class="text-muted small">Gestión de cortinas</p>
                    <a href="{{ route('cortinas.index') }}" class="btn btn-custom w-100" style="background:#00796b; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Muebles</h5>
                    <p class="text-muted small">Inventario de muebles</p>
                    <a href="{{ route('muebles.index') }}" class="btn btn-custom w-100" style="background:#546e7a; color:white;">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón Pokémon -->
    <div class="text-center mt-5">
        <a href="{{ route('pokemon.index') }}" class="btn btn-lg btn-custom px-4 shadow-sm" style="background:#ffca28; color:black;">
            🎮 Explorar Pokémon
        </a>
    </div>
</div>
@endsection
