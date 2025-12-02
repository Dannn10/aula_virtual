@extends('layouts.app')

@section('content')
<style>
    .dashboard-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: none;
        overflow: hidden;
        height: 100%;
    }
    
    .dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }
    
    .card-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
    }
    
    .card-title {
        font-weight: 700;
        color: #2c3e50;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    
    .card-description {
        color: #7f8c8d;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
        line-height: 1.4;
    }
    
    .btn-module {
        border-radius: 25px;
        font-weight: 600;
        padding: 0.5rem 1.5rem;
        transition: all 0.3s ease;
        border: none;
        width: 100%;
    }
    
    .btn-module:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .welcome-header {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        border-radius: 15px;
        padding: 2.5rem;
        margin-bottom: 2.5rem;
        text-align: center;
        box-shadow: 0 10px 30px rgba(67, 97, 238, 0.3);
    }
    
    .welcome-title {
        font-weight: 800;
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .welcome-subtitle {
        font-size: 1.2rem;
        opacity: 0.9;
        font-weight: 300;
    }
    
    .section-title {
        font-weight: 700;
        color: #2c3e50;
        margin: 2.5rem 0 1.5rem;
        padding-left: 1rem;
        border-left: 4px solid #4361ee;
        font-size: 1.5rem;
    }
    
    .pokemon-btn {
        background: linear-gradient(135deg, #ffd166, #ff9e00);
        color: #2c3e50;
        border: none;
        border-radius: 50px;
        padding: 1rem 2.5rem;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 158, 0, 0.3);
    }
    
    .pokemon-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 25px rgba(255, 158, 0, 0.4);
        color: #2c3e50;
    }
</style>

<div class="container">
    <!-- Header Mejorado -->
    <div class="welcome-header">
        <h1 class="welcome-title">🌟 Bienvenido al Aula Virtual</h1>
        <p class="welcome-subtitle">Gestioná fácilmente aulas, materias, docentes, reservas y más</p>
    </div>

    <!-- Gestión -->
    <h3 class="section-title"><i class="fas fa-cogs me-2"></i>Gestión</h3>
    <div class="row g-4">
        <!-- Aulas -->
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-primary">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <h5 class="card-title">Aulas</h5>
                    <p class="card-description">Administrá las aulas disponibles</p>
                    <a href="{{ route('aulas.index') }}" class="btn btn-module btn-primary">Ingresar</a>
                </div>
            </div>
        </div>

        <!-- Materias -->
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-success">
                        <i class="fas fa-book"></i>
                    </div>
                    <h5 class="card-title">Materias</h5>
                    <p class="card-description">Organizá las materias del ciclo</p>
                    <a href="{{ route('materias.index') }}" class="btn btn-module btn-success">Ingresar</a>
                </div>
            </div>
        </div>

        <!-- Docentes -->
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-info">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h5 class="card-title">Docentes</h5>
                    <p class="card-description">Gestioná los docentes asignados</p>
                    <a href="{{ route('docentes.index') }}" class="btn btn-module btn-info">Ingresar</a>
                </div>
            </div>
        </div>

        <!-- Reservas -->
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-warning">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                    <h5 class="card-title">Reservas</h5>
                    <p class="card-description">Controlá las reservas de aulas</p>
                    <a href="{{ route('reservas.index') }}" class="btn btn-module btn-warning">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Horarios -->
    <h3 class="section-title"><i class="fas fa-clock me-2"></i>Horarios</h3>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-primary">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="card-title">Horarios</h5>
                    <p class="card-description">Planificá horarios de clases</p>
                    <a href="{{ route('horarios.index') }}" class="btn btn-module btn-primary">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-success">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h5 class="card-title">Disponibilidades</h5>
                    <p class="card-description">Verificá disponibilidades</p>
                    <a href="{{ route('disponibilidades.index') }}" class="btn btn-module btn-success">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-info">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5 class="card-title">Reservas</h5>
                    <p class="card-description">Controlá las reservas de aulas</p>
                    <a href="{{ route('reservas.index') }}" class="btn btn-module btn-info">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Infraestructura -->
    <h3 class="section-title"><i class="fas fa-building me-2"></i>Infraestructura</h3>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-warning">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h5 class="card-title">Focos</h5>
                    <p class="card-description">Encendido y control de focos</p>
                    <a href="{{ route('focos.index') }}" class="btn btn-module btn-warning">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-secondary">
                        <i class="fas fa-history"></i>
                    </div>
                    <h5 class="card-title">Historial Focos</h5>
                    <p class="card-description">Registro de focos usados</p>
                    <a href="{{ route('historialfocos.index') }}" class="btn btn-module btn-secondary">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-info">
                        <i class="fas fa-wind"></i>
                    </div>
                    <h5 class="card-title">Aires Acond.</h5>
                    <p class="card-description">Control de aires acondicionados</p>
                    <a href="{{ route('aireacondicionados.index') }}" class="btn btn-module btn-info">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-danger">
                        <i class="fas fa-history"></i>
                    </div>
                    <h5 class="card-title">Historial Aires</h5>
                    <p class="card-description">Uso de aires acondicionados</p>
                    <a href="{{ route('historialusoaireacondicionados.index') }}" class="btn btn-module btn-danger">Ingresar</a>
                </div>
            </div>
        </div>
        
        <!-- Cortinas y Muebles -->
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-success">
                        <i class="fas fa-border-style"></i>
                    </div>
                    <h5 class="card-title">Cortinas</h5>
                    <p class="card-description">Gestión de cortinas</p>
                    <a href="{{ route('cortinas.index') }}" class="btn btn-module btn-success">Ingresar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="card-body text-center p-4">
                    <div class="card-icon text-dark">
                        <i class="fas fa-couch"></i>
                    </div>
                    <h5 class="card-title">Muebles</h5>
                    <p class="card-description">Inventario de muebles</p>
                    <a href="{{ route('muebles.index') }}" class="btn btn-module btn-dark">Ingresar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón Pokémon Mejorado -->
    <div class="text-center mt-5 mb-4">
        <a href="{{ route('pokemon.index') }}" class="btn pokemon-btn">
            <i class="fas fa-gamepad me-2"></i>🎮 Explorar Pokémon
        </a>
    </div>
</div>
@endsection