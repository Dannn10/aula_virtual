@extends('layouts.app')

@section('content')
<style>
    .horarios-header { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
    .btn-horarios { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
    .badge-horario { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
    .schedule-day { border-left: 4px solid #3b82f6; }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header horarios-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-clock me-3"></i>Gestión de Horarios
                </h1>
                <p class="section-subtitle">Planificá y organizá los horarios de clases del ciclo lectivo</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-calendar-alt me-2"></i>Planificación
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Horarios Activos</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Materias Program.</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Docentes Asign.</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Aulas Ocupadas</div>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="main-card mb-4">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Carrera</label>
                    <select class="form-select">
                        <option>Todas las carreras</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Aula</label>
                    <select class="form-select">
                        <option>Todas las aulas</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Día de la Semana</label>
                    <select class="form-select">
                        <option>Todos los días</option>
                        <option>Lunes</option>
                        <option>Martes</option>
                        <option>Miércoles</option>
                        <option>Jueves</option>
                        <option>Viernes</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Turno</label>
                    <select class="form-select">
                        <option>Todos los turnos</option>
                        <option>Mañana</option>
                        <option>Tarde</option>
                        <option>Noche</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Vista Semanal -->
    <div class="main-card mb-4">
        <div class="card-header-custom">
            <h3 class="card-title mb-0">
                <i class="fas fa-calendar-week me-2"></i>Vista Semanal de Horarios
            </h3>
        </div>
        <div class="card-body">
            <div class="row text-center mb-3">
                <div class="col schedule-day p-3 bg-light">
                    <strong>Lunes</strong>
                </div>
                <div class="col schedule-day p-3 bg-light">
                    <strong>Martes</strong>
                </div>
                <div class="col schedule-day p-3 bg-light">
                    <strong>Miércoles</strong>
                </div>
                <div class="col schedule-day p-3 bg-light">
                    <strong>Jueves</strong>
                </div>
                <div class="col schedule-day p-3 bg-light">
                    <strong>Viernes</strong>
                </div>
            </div>
            <div class="text-center py-4">
                <i class="fas fa-calendar text-muted" style="font-size: 3rem;"></i>
                <p class="text-muted mt-3">Vista semanal de horarios disponible próximamente</p>
                <button class="btn btn-outline-primary">
                    <i class="fas fa-table me-2"></i>Ver Vista de Tabla
                </button>
            </div>
        </div>
    </div>

    <!-- Card Principal -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-list me-2"></i>Listado de Horarios
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar horario...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-horarios w-100">
                                <i class="fas fa-plus me-2"></i>Nuevo Horario
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($horarios && count($horarios) > 0)
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th width="100">Código</th>
                                <th>Materia</th>
                                <th width="120">Docente</th>
                                <th width="100">Aula</th>
                                <th width="120">Día</th>
                                <th width="150">Horario</th>
                                <th width="200" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($horarios as $horario)
                            <tr>
                                <td class="fw-bold text-primary">HOR-{{ $horario->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary rounded-circle p-2 me-3">
                                            <i class="fas fa-book text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $horario->materia->nombre }}</div>
                                            <small class="text-muted">{{ $horario->carrera }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $horario->docente->nombre }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $horario->aula->nombre }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-warning">
                                        {{ $horario->dia_semana }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge-horario text-white">
                                        {{ $horario->hora_inicio }} - {{ $horario->hora_fin }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-action" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-success btn-action" title="Duplicar">
                                        <i class="fas fa-copy"></i>
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
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay horarios registrados</h4>
                    <p class="text-muted mb-4">Comienza creando el primer horario del sistema</p>
                    <button class="btn btn-primary-custom btn-horarios">
                        <i class="fas fa-plus me-2"></i>Crear Primer Horario
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Información Adicional -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Gestión de Horarios
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-primary border-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> Los horarios se organizan por días de la semana y turnos.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Evita superposiciones de horarios</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Considera la disponibilidad de aulas</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Respeta los horarios de los docentes</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt me-2"></i>Acciones Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100 py-2">
                                <i class="fas fa-print me-2"></i>Imprimir Horarios
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-file-export me-2"></i>Exportar PDF
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-info w-100 py-2">
                                <i class="fas fa-sync me-2"></i>Actualizar
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-warning w-100 py-2">
                                <i class="fas fa-copy me-2"></i>Duplicar Semana
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection