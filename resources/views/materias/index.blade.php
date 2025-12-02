@extends('layouts.app')

@section('content')
<style>
    .materias-header { background: linear-gradient(135deg, #10b981, #047857); }
    .btn-materias { background: linear-gradient(135deg, #10b981, #047857); }
    .badge-creditos { background: linear-gradient(135deg, #10b981, #047857); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header materias-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-book me-3"></i>Gestión de Materias
                </h1>
                <p class="section-subtitle">Organizá y administrá todas las materias del ciclo lectivo</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-graduation-cap me-2"></i>Plan de Estudios
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Total Materias</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Materias Activas</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">Créditos Totales</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number">0</div>
                <div class="stats-label">En Electivas</div>
            </div>
        </div>
    </div>

    <!-- Card Principal -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-list me-2"></i>Listado de Materias
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar materia...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-materias w-100">
                                <i class="fas fa-plus me-2"></i>Nueva Materia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($materias && count($materias) > 0)
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th width="80">Código</th>
                                <th>Nombre de la Materia</th>
                                <th width="120">Créditos</th>
                                <th width="120">Horas Sem.</th>
                                <th width="120">Tipo</th>
                                <th width="200" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materias as $materia)
                            <tr>
                                <td class="fw-bold text-success">MAT-{{ $materia->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success rounded-circle p-2 me-3">
                                            <i class="fas fa-book text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $materia->nombre }}</div>
                                            <small class="text-muted">{{ $materia->carrera ?? 'Carrera General' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-creditos">
                                        <i class="fas fa-star me-1"></i>{{ $materia->creditos }} créditos
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        <i class="fas fa-clock me-1"></i>{{ $materia->horas }}h
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $materia->tipo == 'Obligatoria' ? 'primary' : 'warning' }}">
                                        {{ $materia->tipo }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-success btn-action" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Ver Detalles">
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
                        <i class="fas fa-books"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay materias registradas</h4>
                    <p class="text-muted mb-4">Comienza agregando la primera materia al sistema</p>
                    <button class="btn btn-primary-custom btn-materias">
                        <i class="fas fa-plus me-2"></i>Agregar Primera Materia
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
                        <i class="fas fa-info-circle me-2"></i>Gestión Académica
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-success border-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> Las materias pueden tener prerrequisitos y correquisitos.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Define créditos y horas semanales</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Establece correlatividades</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Asigna docentes responsables</li>
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
                            <button class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-print me-2"></i>Plan de Estudios
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
                                <i class="fas fa-copy me-2"></i>Duplicar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection