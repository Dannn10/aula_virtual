@extends('layouts.app')

@section('content')
<style>
    .docentes-header { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .btn-docentes { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .badge-especialidad { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header docentes-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-user-tie me-3"></i>Gestión de Docentes
                </h1>
                <p class="section-subtitle">Administrá el cuerpo docente y sus asignaciones</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-chalkboard me-2"></i>Plantel Docente
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Total Docentes</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Activos</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Titulares</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Suplentes</div>
            </div>
        </div>
    </div>

    <!-- Card Principal -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-list me-2"></i>Listado de Docentes
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar docente...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-docentes w-100">
                                <i class="fas fa-plus me-2"></i>Nuevo Docente
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($docentes && count($docentes) > 0)
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th width="80">ID</th>
                                <th>Docente</th>
                                <th width="150">Especialidad</th>
                                <th width="120">Tipo</th>
                                <th width="120">Materias</th>
                                <th width="200" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($docentes as $docente)
                            <tr>
                                <td class="fw-bold text-purple">#{{ $docente->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-purple rounded-circle p-2 me-3">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $docente->nombre }} {{ $docente->apellido }}</div>
                                            <small class="text-muted">{{ $docente->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-especialidad">
                                        <i class="fas fa-graduation-cap me-1"></i>{{ $docente->especialidad }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $docente->tipo == 'Titular' ? 'success' : 'warning' }}">
                                        {{ $docente->tipo }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        <i class="fas fa-book me-1"></i>{{ $docente->materias_count ?? 0 }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-purple btn-action" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Ver Perfil">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-danger btn-action" title="Eliminar">
                                        <i class="fas fa-trash"></i>
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
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay docentes registrados</h4>
                    <p class="text-muted mb-4">Comienza agregando el primer docente al sistema</p>
                    <button class="btn btn-primary-custom btn-docentes">
                        <i class="fas fa-plus me-2"></i>Agregar Primer Docente
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Información Adicional -->
    <div class="row">
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Gestión Docente
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-purple border-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> Los docentes pueden ser asignados a múltiples materias.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Define especialidades y categorías</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Asigna horarios de disponibilidad</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gestiona suplencias y licencias</li>
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
                            <button class="btn btn-outline-purple w-100 py-2">
                                <i class="fas fa-print me-2"></i>Listado
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100 py-2">
                                <i class="fas fa-file-export me-2"></i>Exportar
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-info w-100 py-2">
                                <i class="fas fa-sync me-2"></i>Actualizar
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-warning w-100 py-2">
                                <i class="fas fa-chart-bar me-2"></i>Estadísticas
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-purple { background-color: #8b5cf6 !important; }
    .text-purple { color: #8b5cf6 !important; }
    .btn-outline-purple { 
        border-color: #8b5cf6; 
        color: #8b5cf6;
    }
    .btn-outline-purple:hover {
        background-color: #8b5cf6;
        color: white;
    }
    .alert-purple {
        background-color: rgba(139, 92, 246, 0.1);
        border-left: 4px solid #8b5cf6;
    }
</style>
@endsection