@extends('layouts.app')

@section('content')
<style>
    .historial-focos-header { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .btn-historial-focos { background: linear-gradient(135deg, #8b5cf6, #7c3aed); }
    .badge-encendido { background: linear-gradient(135deg, #10b981, #047857); }
    .badge-apagado { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .historial-card { border-left: 4px solid #8b5cf6; }
    .consumo-chart { height: 200px; background: linear-gradient(180deg, #f8fafc, #e2e8f0); border-radius: 10px; }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header historial-focos-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-history me-3"></i>Historial de Focos
                </h1>
                <p class="section-subtitle">Registro y análisis del uso de iluminación en las aulas</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-chart-line me-2"></i>Análisis de Consumo
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="total-eventos">0</div>
                <div class="stats-label">Eventos Registrados</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="horas-encendido">0h</div>
                <div class="stats-label">Horas Encendido</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="consumo-mes">0 kWh</div>
                <div class="stats-label">Consumo Este Mes</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="ahorro">15%</div>
                <div class="stats-label">Ahorro Energético</div>
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
                    <label class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha-inicio">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Fecha Fin</label>
                    <input type="date" class="form-control" id="fecha-fin">
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
                    <label class="form-label">Tipo de Evento</label>
                    <select class="form-select" id="filtro-evento">
                        <option value="">Todos los eventos</option>
                        <option>Encendido</option>
                        <option>Apagado</option>
                        <option>Automático</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-primary-custom btn-historial-focos me-2">
                        <i class="fas fa-search me-2"></i>Filtrar
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-redo me-2"></i>Limpiar
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
                            <div class="bg-success rounded-top" style="height: 150px; width: 30px;"></div>
                            <small class="mt-1">Lun</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-success rounded-top" style="height: 120px; width: 30px;"></div>
                            <small class="mt-1">Mar</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-success rounded-top" style="height: 180px; width: 30px;"></div>
                            <small class="mt-1">Mié</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-success rounded-top" style="height: 90px; width: 30px;"></div>
                            <small class="mt-1">Jue</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-success rounded-top" style="height: 160px; width: 30px;"></div>
                            <small class="mt-1">Vie</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-warning rounded-top" style="height: 40px; width: 30px;"></div>
                            <small class="mt-1">Sáb</small>
                        </div>
                        <div class="chart-bar d-flex flex-column align-items-center">
                            <div class="bg-warning rounded-top" style="height: 30px; width: 30px;"></div>
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
                        <i class="fas fa-chart-pie me-2"></i>Distribución por Aula
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-center">
                            <div class="mb-3">
                                <i class="fas fa-chart-pie text-muted" style="font-size: 4rem;"></i>
                            </div>
                            <p class="text-muted">Gráfico de distribución disponible próximamente</p>
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
                        <i class="fas fa-list me-2"></i>Registro de Eventos
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar en historial...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-historial-focos w-100">
                                <i class="fas fa-file-export me-2"></i>Exportar
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
                                <th width="120">Fecha y Hora</th>
                                <th width="150">Aula</th>
                                <th>Foco</th>
                                <th width="120">Evento</th>
                                <th width="120">Duración</th>
                                <th width="100">Consumo</th>
                                <th width="120">Tipo</th>
                                <th width="100" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historial as $registro)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ $registro->fecha }}</div>
                                    <small class="text-muted">{{ $registro->hora }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $registro->aula }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-lightbulb text-warning me-2"></i>
                                        <span>{{ $registro->foco }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge {{ $registro->evento == 'Encendido' ? 'badge-encendido' : 'badge-apagado' }}">
                                        {{ $registro->evento }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $registro->duracion ?? '--' }}</span>
                                </td>
                                <td>
                                    <span class="fw-bold text-success">{{ $registro->consumo ?? '0' }}W</span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $registro->tipo == 'Manual' ? 'info' : 'secondary' }}">
                                        {{ $registro->tipo }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-purple btn-action" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Descargar">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="card-footer-custom">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mb-0">
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
            @else
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="fas fa-history"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay registros históricos</h4>
                    <p class="text-muted mb-4">El historial se generará automáticamente con el uso del sistema</p>
                    <button class="btn btn-outline-primary">
                        <i class="fas fa-sync me-2"></i>Actualizar
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
                        <i class="fas fa-info-circle me-2"></i>Análisis de Datos
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-purple border-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> El historial ayuda a optimizar el consumo energético.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-chart-line text-success me-2"></i>Identifica patrones de uso</li>
                        <li class="mb-2"><i class="fas fa-money-bill-wave text-success me-2"></i>Reduce costos energéticos</li>
                        <li class="mb-2"><i class="fas fa-leaf text-success me-2"></i>Mejora la eficiencia ambiental</li>
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
                                <i class="fas fa-print me-2"></i>Imprimir Reporte
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-success w-100 py-2">
                                <i class="fas fa-file-pdf me-2"></i>Exportar PDF
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-info w-100 py-2">
                                <i class="fas fa-sync me-2"></i>Actualizar
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-warning w-100 py-2">
                                <i class="fas fa-cog me-2"></i>Configurar
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
    .chart-bar {
        transition: transform 0.3s ease;
    }
    .chart-bar:hover {
        transform: scale(1.1);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicializar fechas por defecto
        const today = new Date();
        const oneWeekAgo = new Date(today.getTime() - 7 * 24 * 60 * 60 * 1000);
        
        document.getElementById('fecha-inicio').value = oneWeekAgo.toISOString().split('T')[0];
        document.getElementById('fecha-fin').value = today.toISOString().split('T')[0];
        
        // Simular datos de estadísticas
        function updateStats() {
            const totalEventos = Math.floor(Math.random() * 500) + 100;
            const horasEncendido = Math.floor(Math.random() * 200) + 50;
            const consumoMes = Math.floor(Math.random() * 1000) + 500;
            
            document.getElementById('total-eventos').textContent = totalEventos.toLocaleString();
            document.getElementById('horas-encendido').textContent = horasEncendido + 'h';
            document.getElementById('consumo-mes').textContent = consumoMes + ' kWh';
        }
        
        updateStats();
    });
</script>
@endsection