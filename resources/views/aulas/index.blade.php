@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Encabezado -->
    <div class="section-header bg-primary text-white rounded-top p-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title mb-0">
                    <i class="fas fa-door-open me-3"></i>Gestión de Aulas
                </h1>
                <p class="section-subtitle mb-0 mt-2">Administra las aulas disponibles en el sistema</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('aulas.create') }}" class="btn btn-light">
                    <i class="fas fa-plus-circle me-2"></i>Nueva Aula
                </a>
            </div>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Estadísticas -->
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="stats-card bg-info text-white">
                <div class="stats-number">{{ $aulas->count() }}</div>
                <div class="stats-label">Total de Aulas</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card bg-success text-white">
                <div class="stats-number">{{ $aulas->where('disponible', true)->count() }}</div>
                <div class="stats-label">Aulas Disponibles</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card bg-warning text-white">
                <div class="stats-number">{{ $aulas->where('tipo', 'laboratorio')->count() }}</div>
                <div class="stats-label">Laboratorios</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card bg-secondary text-white">
                <div class="stats-number">{{ $aulas->sum('capacidad') }}</div>
                <div class="stats-label">Capacidad Total</div>
            </div>
        </div>
    </div>

    <!-- Card principal -->
    <div class="card shadow border-0 mt-4">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-list me-2"></i>Listado de Aulas
                    </h5>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar aula..." id="search-input">
                        <button class="btn btn-outline-secondary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            @if($aulas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th width="80">Código</th>
                                <th>Aula</th>
                                <th width="120">Edificio</th>
                                <th width="100">Piso</th>
                                <th width="100">Capacidad</th>
                                <th width="120">Tipo</th>
                                <th width="100">Estado</th>
                                <th width="150" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($aulas as $aula)
                            <tr>
                                <td>
                                    <span class="badge bg-primary fs-6">{{ $aula->codigo }}</span>
                                </td>
                                <td>
                                    <strong>{{ $aula->nombre }}</strong>
                                    @if($aula->descripcion)
                                        <br><small class="text-muted">{{ Str::limit($aula->descripcion, 50) }}</small>
                                    @endif
                                </td>
                                <td>{{ $aula->edificio }}</td>
                                <td class="text-center">{{ $aula->piso }}</td>
                                <td class="text-center">
                                    <span class="badge bg-secondary">{{ $aula->capacidad }}</span>
                                </td>
                                <td>
                                    @php
                                        $tipoColors = [
                                            'regular' => 'info',
                                            'laboratorio' => 'warning',
                                            'audiovisual' => 'primary',
                                            'computacion' => 'success',
                                            'especial' => 'purple'
                                        ];
                                    @endphp
                                    <span class="badge bg-{{ $tipoColors[$aula->tipo] ?? 'secondary' }}">
                                        {{ ucfirst($aula->tipo) }}
                                    </span>
                                </td>
                                <td>
                                    @if($aula->disponible)
                                        <span class="badge bg-success">Disponible</span>
                                    @else
                                        <span class="badge bg-danger">No Disponible</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('aulas.show', $aula->id) }}" class="btn btn-sm btn-outline-info" title="Ver">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar esta aula?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- Estado vacío -->
                <div class="text-center py-5">
                    <div class="empty-state-icon mb-3">
                        <i class="fas fa-door-closed fa-4x text-muted"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay aulas registradas</h4>
                    <p class="text-muted mb-4">Comienza agregando la primera aula al sistema</p>
                    <a href="{{ route('aulas.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus-circle me-2"></i>Agregar Primera Aula
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .stats-card {
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .stats-number {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .stats-label {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    .empty-state-icon {
        opacity: 0.5;
    }
</style>

<script>
    // Búsqueda simple
    document.getElementById('search-input').addEventListener('keyup', function() {
        const searchText = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchText) ? '' : 'none';
        });
    });
</script>
@endsection