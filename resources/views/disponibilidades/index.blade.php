@extends('layouts.app')

@section('content')
<style>
    .disponibilidades-header { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .btn-disponibilidades { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .badge-disponible { background: linear-gradient(135deg, #10b981, #047857); }
    .badge-ocupado { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .availability-card { border-left: 4px solid #06b6d4; }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header disponibilidades-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-check-circle me-3"></i>Gestión de Disponibilidades
                </h1>
                <p class="section-subtitle">Verificá la disponibilidad de aulas y recursos en tiempo real</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-search me-2"></i>Estado en Tiempo Real
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="aulas-disponibles">0</div>
                <div class="stats-label">Aulas Disponibles</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="aulas-ocupadas">0</div>
                <div class="stats-label">Aulas Ocupadas</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="aulas-mantenimiento">0</div>
                <div class="stats-label">En Mantenimiento</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="ocupacion-total">0%</div>
                <div class="stats-label">Ocupación Total</div>
            </div>
        </div>
    </div>

    <!-- Filtros Rápidos -->
    <div class="main-card mb-4">
        <div class="card-header-custom">
            <h5 class="card-title mb-0">
                <i class="fas fa-filter me-2"></i>Filtros de Disponibilidad
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Fecha</label>
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="fecha-consulta">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Hora</label>
                    <input type="time" class="form-control" value="{{ date('H:i') }}" id="hora-consulta">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Edificio</label>
                    <select class="form-select" id="edificio-filtro">
                        <option value="">Todos los edificios</option>
                        <option>Edificio Principal</option>
                        <option>Edificio A</option>
                        <option>Edificio B</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary-custom btn-disponibilidades w-100">
                        <i class="fas fa-search me-2"></i>Consultar Disponibilidad
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vista de Disponibilidad -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-list me-2"></i>Estado de Aulas - Hoy
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="btn-group">
                        <button class="btn btn-outline-primary active" data-view="grid">
                            <i class="fas fa-th me-2"></i>Vista Grid
                        </button>
                        <button class="btn btn-outline-primary" data-view="list">
                            <i class="fas fa-list me-2"></i>Vista Lista
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Vista Grid -->
            <div id="grid-view" class="row g-3">
                @if(isset($aulas) && count($aulas) > 0)
                    @foreach($aulas as $aula)
                    <div class="col-md-4">
                        <div class="availability-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-0">{{ $aula->nombre ?? 'Nombre no disponible' }}</h5>
                                    <span class="badge {{ ($aula->disponible ?? false) ? 'badge-disponible' : 'badge-ocupado' }}">
                                        {{ ($aula->disponible ?? false) ? 'Disponible' : 'Ocupada' }}
                                    </span>
                                </div>
                                <p class="text-muted small mb-2">
                                    <i class="fas fa-building me-2"></i>{{ $aula->edificio ?? 'Edificio no especificado' }}
                                </p>
                                <p class="text-muted small mb-3">
                                    <i class="fas fa-users me-2"></i>Capacidad: {{ $aula->capacidad ?? 'N/A' }} personas
                                </p>
                                
                                @if(!($aula->disponible ?? true))
                                <div class="alert alert-warning p-2 small mb-3">
                                    <i class="fas fa-clock me-1"></i>
                                    <strong>Ocupada:</strong> {{ $aula->reserva_actual ?? 'Clase en curso' }}
                                </div>
                                @endif
                                
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i>Ver Detalles
                                    </button>
                                    @if($aula->disponible ?? false)
                                    <button class="btn btn-success btn-sm">
                                        <i class="fas fa-calendar-plus me-1"></i>Reservar
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="fas fa-door-closed"></i>
                            </div>
                            <h4 class="text-muted mb-3">No hay aulas registradas</h4>
                            <p class="text-muted mb-4">No se puede verificar la disponibilidad</p>
                            <a href="{{ route('aulas.index') }}" class="btn btn-primary-custom">
                                <i class="fas fa-plus me-2"></i>Gestionar Aulas
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Vista Lista (oculta inicialmente) -->
            <div id="list-view" class="d-none">
                @if(isset($aulas) && count($aulas) > 0)
                    <div class="table-responsive">
                        <table class="table table-custom table-hover">
                            <thead>
                                <tr>
                                    <th>Aula</th>
                                    <th width="120">Edificio</th>
                                    <th width="100">Capacidad</th>
                                    <th width="120">Estado</th>
                                    <th width="150">Próxima Disponibilidad</th>
                                    <th width="200" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aulas as $aula)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-cyan rounded-circle p-2 me-3">
                                                <i class="fas fa-door-open text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $aula->nombre ?? 'Nombre no disponible' }}</div>
                                                <small class="text-muted">ID: {{ $aula->id ?? 'N/A' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $aula->edificio ?? 'Edificio no especificado' }}</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $aula->capacidad ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ ($aula->disponible ?? false) ? 'badge-disponible' : 'badge-ocupado' }}">
                                            {{ ($aula->disponible ?? false) ? 'Disponible' : 'Ocupada' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if(!($aula->disponible ?? true))
                                            <small class="text-muted">{{ $aula->proxima_disponibilidad ?? '--:--' }}</small>
                                        @else
                                            <small class="text-success">Disponible ahora</small>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-cyan btn-action" title="Ver Detalles">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @if($aula->disponible ?? false)
                                        <button class="btn btn-success btn-action" title="Reservar">
                                            <i class="fas fa-calendar-plus"></i>
                                        </button>
                                        @endif
                                        <button class="btn btn-outline-info btn-action" title="Historial">
                                            <i class="fas fa-history"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Información Adicional -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle me-2"></i>Información de Disponibilidad
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-cyan border-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> La disponibilidad se actualiza en tiempo real según las reservas activas.
                    </div>
                    <div class="legend">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge-disponible me-2" style="width: 20px; height: 20px;"></span>
                            <small>Aula disponible para reservar</small>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge-ocupado me-2" style="width: 20px; height: 20px;"></span>
                            <small>Aula ocupada o en uso</small>
                        </div>
                    </div>
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
                            <button class="btn btn-outline-cyan w-100 py-2">
                                <i class="fas fa-sync me-2"></i>Actualizar
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-primary w-100 py-2">
                                <i class="fas fa-print me-2"></i>Reporte
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-calendar me-2"></i>Ver Calendario
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
    .bg-cyan { background-color: #06b6d4 !important; }
    .text-cyan { color: #06b6d4 !important; }
    .btn-outline-cyan { 
        border-color: #06b6d4; 
        color: #06b6d4;
    }
    .btn-outline-cyan:hover {
        background-color: #06b6d4;
        color: white;
    }
    .alert-cyan {
        background-color: rgba(6, 182, 212, 0.1);
        border-left: 4px solid #06b6d4;
    }
    .badge-disponible, .badge-ocupado {
        color: white;
        padding: 0.5em 1em;
        border-radius: 20px;
        font-size: 0.8em;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cambio entre vistas
        const gridView = document.getElementById('grid-view');
        const listView = document.getElementById('list-view');
        const viewButtons = document.querySelectorAll('[data-view]');
        
        viewButtons.forEach(button => {
            button.addEventListener('click', function() {
                const view = this.getAttribute('data-view');
                
                // Actualizar botones activos
                viewButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                
                // Mostrar vista correspondiente
                if (view === 'grid') {
                    gridView.classList.remove('d-none');
                    listView.classList.add('d-none');
                } else {
                    gridView.classList.add('d-none');
                    listView.classList.remove('d-none');
                }
            });
        });
        
        // Simular actualización de estadísticas
        function updateStats() {
            const disponibles = Math.floor(Math.random() * 10) + 5;
            const ocupadas = Math.floor(Math.random() * 5) + 1;
            const total = disponibles + ocupadas;
            const porcentaje = Math.round((ocupadas / total) * 100);
            
            document.getElementById('aulas-disponibles').textContent = disponibles;
            document.getElementById('aulas-ocupadas').textContent = ocupadas;
            document.getElementById('aulas-mantenimiento').textContent = '0';
            document.getElementById('ocupacion-total').textContent = porcentaje + '%';
        }
        
        // Actualizar cada 30 segundos
        updateStats();
        setInterval(updateStats, 30000);
    });
</script>
@endsection