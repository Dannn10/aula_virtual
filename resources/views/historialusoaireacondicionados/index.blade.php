@extends('layouts.app')

@section('content')
<style>
    .historial-aires-header { background: linear-gradient(135deg, #ec4899, #db2777); }
    .btn-historial-aires { background: linear-gradient(135deg, #ec4899, #db2777); }
    .badge-enfriamiento { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .badge-calentamiento { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .historial-card { border-left: 4px solid #ec4899; }
    .consumo-chart { height: 200px; background: linear-gradient(180deg, #fdf2f8, #fce7f3); border-radius: 10px; }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header historial-aires-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-history me-3"></i>Historial de Aires Acondicionados
                </h1>
                <p class="section-subtitle">Registro y análisis del uso de climatización en las aulas</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-chart-line me-2"></i>Análisis de Climatización
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="total-horas">0h</div>
                <div class="stats-label">Horas de Uso</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="consumo-total">0 kWh</div>
                <div class="stats-label">Consumo Total</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="costo-total">$0</div>
                <div class="stats-label">Costo Estimado</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="eficiencia">78%</div>
                <div class="stats-label">Eficiencia</div>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="main-card mb-4">
        <div class="card-header-custom">
            <h5 class="card-title mb-0">
                <i class="fas fa-filter me-2"></i>Filtros de Historial
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Período</label>
                    <select class="form-select" id="periodo-filtro">
                        <option value="7">Última semana</option>
                        <option value="30">Último mes</option>
                        <option value="90">Últimos 3 meses</option>
                        <option value="custom">Personalizado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Aula</label>
                    <select class="form-select" id="filtro-aula">
                        <option value="">Todas las aulas</option>
                        <option>Aula 101</option>
                        <option>Aula 102</option>
                        <option>Aula 201</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Modo de Operación</label>
                    <select class="form-select" id="filtro-modo">
                        <option value="">Todos los modos</option>
                        <option>Enfriamiento</option>
                        <option>Calentamiento</option>
                        <option>Ventilación</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Tipo de Control</label>
                    <select class="form-select" id="filtro-control">
                        <option value="">Todos los tipos</option>
                        <option>Manual</option>
                        <option>Automático</option>
                        <option>Programado</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3" id="custom-dates" style="display: none;">
                <div class="col-md-6">
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha-inicio-custom">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control" id="fecha-fin-custom">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-primary-custom btn-historial-aires me-2">
                        <i class="fas fa-search me-2"></i>Generar Reporte
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-file-export me-2"></i>Exportar CSV
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Consumo por Día (Última Semana)
                    </h5>
                </div>
                <div class="card-body">
                    <div class="consumo-chart d-flex align-items-end justify-content-around p-3">
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-pink rounded-top" style="height: 80px; width: 30px;"></div>
                            <small class="mt-1">Lun</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-pink rounded-top" style="height: 120px; width: 30px;"></div>
                            <small class="mt-1">Mar</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-pink rounded-top" style="height: 150px; width: 30px;"></div>
                            <small class="mt-1">Mié</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-pink rounded-top" style="height: 90px; width: 30px;"></div>
                            <small class="mt-1">Jue</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-pink rounded-top" style="height: 180px; width: 30px;"></div>
                            <small class="mt-1">Vie</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-purple rounded-top" style="height: 40px; width: 30px;"></div>
                            <small class="mt-1">Sáb</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-purple rounded-top" style="height: 30px; width: 30px;"></div>
                            <small class="mt-1">Dom</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="main-card h-100">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-pie me-2"></i>Distribución por Modo
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="mb-3">
                            <i class="fas fa-snowflake text-info" style="font-size: 2rem;"></i>
                            <i class="fas fa-fire text-danger mx-3" style="font-size: 2rem;"></i>
                            <i class="fas fa-fan text-success" style="font-size: 2rem;"></i>
                        </div>
                        <div class="legend">
                            <div class="d-flex justify-content-between mb-1">
                                <small>Enfriamiento: <strong>65%</strong></small>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <small>Calentamiento: <strong>25%</strong></small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small>Ventilación: <strong>10%</strong></small>
                            </div>
                        </div>
                    </div>
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
                        <i class="fas fa-list me-2"></i>Registro de Uso de Aires
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar en historial...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-historial-aires w-100">
                                <i class="fas fa-print me-2"></i>Imprimir
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($historial && count($historial) > 0)
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th width="140">Fecha y Hora</th>
                                <th width="120">Aula</th>
                                <th width="120">Aire</th>
                                <th width="100">Modo</th>
                                <th width="80">Temp.</th>
                                <th width="100">Duración</th>
                                <th width="100">Consumo</th>
                                <th width="120">Control</th>
                                <th width="100" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historial as $registro)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ $registro->fecha }}</div>
                                    <small class="text-muted">{{ $registro->hora_inicio }} - {{ $registro->hora_fin }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $registro->aula }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-wind text-info me-2"></i>
                                        <span>{{ $registro->aire }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $registro->modo == 'Enfriamiento' ? 'badge-enfriamiento' : 'badge-calentamiento' }}">
                                        {{ $registro->modo }}
                                    </span>
                                </td>
                                <td>
                                    <span class="fw-bold">{{ $registro->temperatura }}°C</span>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $registro->duracion }}</span>
                                </td>
                                <td>
                                    <span class="fw-bold text-success">{{ $registro->consumo }} kWh</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $registro->control == 'Automático' ? 'success' : 'info' }}">
                                        {{ $registro->control }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-pink btn-action" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Analizar">
                                        <i class="fas fa-chart-bar"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="card-footer-custom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <small class="text-muted">Mostrando 1-10 de 250 registros</small>
                        </div>
                        <div class="col-md-6">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Siguiente</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-wind"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay registros de uso</h4>
                    <p class="text-muted mb-4">El historial se generará automáticamente con el uso del sistema</p>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-sync me-2"></i>Actualizar
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    .bg-pink { background-color: #ec4899 !important; }
    .text-pink { color: #ec4899 !important; }
    .btn-outline-pink { 
        border-color: #ec4899; 
        color: #ec4899;
    }
    .btn-outline-pink:hover {
        background-color: #ec4899;
        color: white;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mostrar/ocultar fechas personalizadas
        document.getElementById('periodo-filtro').addEventListener('change', function() {
            const customDates = document.getElementById('custom-dates');
            if (this.value === 'custom') {
                customDates.style.display = 'block';
            } else {
                customDates.style.display = 'none';
            }
        });
        
        // Simular datos de estadísticas
        function updateStats() {
            const totalHoras = Math.floor(Math.random() * 500) + 100;
            const consumoTotal = Math.floor(Math.random() * 2000) + 500;
            const costoTotal = Math.floor(consumoTotal * 0.15);
            
            document.getElementById('total-horas').textContent = totalHoras + 'h';
            document.getElementById('consumo-total').textContent = consumoTotal + ' kWh';
            document.getElementById('costo-total').textContent = '$' + costoTotal;
        }
        
        updateStats();
    });
</script>
@endsection