@extends('layouts.app')

@section('content')
<style>
    .reservas-header { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .btn-reservas { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .badge-estado { background: linear-gradient(135deg, #f59e0b, #d97706); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header reservas-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-calendar-check me-3"></i>Gestión de Reservas
                </h1>
                <p class="section-subtitle">Controlá y administrá las reservas de aulas y espacios</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-clock me-2"></i>Calendario Académico
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Reservas Hoy</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Activas</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Pendientes</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Esta Semana</div>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="main-card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Aula</label>
                    <select class="form-select">
                        <option>Todas las aulas</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Estado</label>
                    <select class="form-select">
                        <option>Todos los estados</option>
                        <option>Confirmada</option>
                        <option>Pendiente</option>
                        <option>Cancelada</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Principal -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-list me-2"></i>Listado de Reservas
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar reserva...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-reservas w-100">
                                <i class="fas fa-plus me-2"></i>Nueva Reserva
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($reservas && count($reservas) > 0)
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th width="100">Código</th>
                                <th>Aula</th>
                                <th width="150">Solicitante</th>
                                <th width="120">Fecha</th>
                                <th width="120">Horario</th>
                                <th width="120">Estado</th>
                                <th width="200" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservas as $reserva)
                            <tr>
                                <td class="fw-bold text-warning">RES-{{ $reserva->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning rounded-circle p-2 me-3">
                                            <i class="fas fa-door-open text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $reserva->aula->nombre }}</div>
                                            <small class="text-muted">Capacidad: {{ $reserva->aula->capacidad }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-bold">{{ $reserva->solicitante }}</div>
                                    <small class="text-muted">{{ $reserva->materia }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="fas fa-calendar me-1"></i>{{ $reserva->fecha }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $reserva->hora_inicio }} - {{ $reserva->hora_fin }}
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $estadoClass = [
                                            'Confirmada' => 'success',
                                            'Pendiente' => 'warning',
                                            'Cancelada' => 'danger'
                                        ][$reserva->estado] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $estadoClass }}">
                                        {{ $reserva->estado }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-warning btn-action" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-{{ $reserva->estado == 'Confirmada' ? 'success' : 'secondary' }} btn-action" title="Confirmar">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-calendar-times"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay reservas registradas</h4>
                    <p class="text-muted mb-4">Comienza creando la primera reserva del sistema</p>
                    <button class="btn btn-primary-custom btn-reservas">
                        <i class="fas fa-plus me-2"></i>Crear Primera Reserva
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Información Adicional -->
    <div class="row mt-4">
        <div class="col-md-8">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-calendar-alt me-2"></i>Vista de Calendario
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-5">
                        <i class="fas fa-calendar text-muted" style="font-size: 4rem;"></i>
                        <p class="text-muted mt-3">Vista de calendario de reservas disponible próximamente</p>
                        <button class="btn btn-outline-warning">
                            <i class="fas fa-calendar me-2"></i>Ver Calendario Completo
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-warning py-2">
                            <i class="fas fa-print me-2"></i>Reporte Diario
                        </button>
                        <button class="btn btn-outline-primary py-2">
                            <i class="fas fa-file-export me-2"></i>Exportar
                        </button>
                        <button class="btn btn-outline-info py-2">
                            <i class="fas fa-sync me-2"></i>Actualizar
                        </button>
                        <button class="btn btn-outline-success py-2">
                            <i class="fas fa-calendar-check me-2"></i>Ver Todas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection