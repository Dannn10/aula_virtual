@extends('layouts.app')

@section('content')
<style>
    .cortinas-header { background: linear-gradient(135deg, #f97316, #ea580c); }
    .btn-cortinas { background: linear-gradient(135deg, #f97316, #ea580c); }
    .badge-abierta { background: linear-gradient(135deg, #f97316, #ea580c); }
    .badge-cerrada { background: linear-gradient(135deg, #6b7280, #4b5563); }
    .cortina-card { border-left: 4px solid #f97316; transition: all 0.3s ease; }
    .cortina-card:hover { transform: translateY(-3px); }
    .control-cortina { background: linear-gradient(135deg, #ffedd5, #fed7aa); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header cortinas-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-border-style me-3"></i>Gestión de Cortinas
                </h1>
                <p class="section-subtitle">Controlá las cortinas de las aulas de manera automatizada</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-sun me-2"></i>Control de Luz Natural
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="total-cortinas">0</div>
                <div class="stats-label">Total de Cortinas</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="cortinas-abiertas">0</div>
                <div class="stats-label">Cortinas Abiertas</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="cortinas-automaticas">0</div>
                <div class="stats-label">Modo Automático</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="luz-natural">75%</div>
                <div class="stats-label">Uso Luz Natural</div>
            </div>
        </div>
    </div>

    <!-- Controles Globales -->
    <div class="main-card mb-4">
        <div class="card-header-custom">
            <h5 class="card-title mb-0">
                <i class="fas fa-sliders-h me-2"></i>Controles Globales
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-3">
                    <button class="btn btn-success w-100 py-2" id="abrir-todas">
                        <i class="fas fa-arrow-up me-2"></i>Abrir Todas
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger w-100 py-2" id="cerrar-todas">
                        <i class="fas fa-arrow-down me-2"></i>Cerrar Todas
                    </button>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Nivel Global</label>
                    <input type="range" class="form-range" min="0" max="100" value="50" id="nivel-global">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Modo Automático</label>
                    <select class="form-select" id="modo-automatico">
                        <option value="off">Desactivado</option>
                        <option value="luz">Por Nivel de Luz</option>
                        <option value="horario">Por Horario</option>
                        <option value="clima">Por Condiciones Climáticas</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Cortinas -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-th me-2"></i>Estado de Cortinas por Aula
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar aula o cortina...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-cortinas w-100">
                                <i class="fas fa-plus me-2"></i>Nueva Cortina
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row g-3" id="grid-cortinas">
                @if($cortinas && count($cortinas) > 0)
                    @foreach($cortinas as $cortina)
                    <div class="col-md-4">
                        <div class="cortina-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-0">{{ $cortina->nombre }}</h5>
                                    <span class="badge {{ $cortina->estado == 'Abierta' ? 'badge-abierta' : 'badge-cerrada' }}" id="estado-{{ $cortina->id }}">
                                        {{ $cortina->estado }}
                                    </span>
                                </div>
                                
                                <div class="cortina-info mb-3">
                                    <div class="row small text-muted">
                                        <div class="col-6">
                                            <i class="fas fa-door-open me-1"></i>
                                            {{ $cortina->aula->nombre }}
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-expand me-1"></i>
                                            {{ $cortina->dimensiones }}
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Control de Cortina -->
                                <div class="control-cortina p-3 rounded mb-3">
                                    <div class="text-center mb-3">
                                        <i class="fas fa-border-style text-warning" style="font-size: 2.5rem;"></i>
                                    </div>
                                    <div class="text-center mb-3">
                                        <h4 class="text-warning mb-1" id="nivel-display-{{ $cortina->id }}">{{ $cortina->nivel_apertura }}%</h4>
                                        <small class="text-muted">Nivel de apertura</small>
                                    </div>
                                    <div class="mb-3">
                                        <input type="range" class="form-range" min="0" max="100" 
                                               value="{{ $cortina->nivel_apertura }}" 
                                               id="nivel-slider-{{ $cortina->id }}">
                                    </div>
                                    <div class="btn-group w-100">
                                        <button class="btn btn-outline-warning btn-sm" onclick="ajustarCortina({{ $cortina->id }}, 0)">
                                            <i class="fas fa-arrow-down"></i> 0%
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" onclick="ajustarCortina({{ $cortina->id }}, 50)">
                                            50%
                                        </button>
                                        <button class="btn btn-outline-warning btn-sm" onclick="ajustarCortina({{ $cortina->id }}, 100)">
                                            100% <i class="fas fa-arrow-up"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Información de Sensor -->
                                <div class="row mb-3 text-center">
                                    <div class="col-6">
                                        <small class="text-muted">Luz Natural</small>
                                        <div class="fw-bold text-success">85%</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Temperatura</small>
                                        <div class="fw-bold text-info">23°C</div>
                                    </div>
                                </div>
                                
                                <!-- Controles -->
                                <div class="d-grid gap-2">
                                    <div class="btn-group">
                                        <button class="btn btn-outline-warning btn-sm toggle-cortina" 
                                                data-cortina-id="{{ $cortina->id }}"
                                                data-estado-actual="{{ $cortina->estado }}">
                                            <i class="fas fa-power-off me-1"></i>
                                            {{ $cortina->estado == 'Abierta' ? 'Cerrar' : 'Abrir' }}
                                        </button>
                                        <button class="btn btn-outline-info btn-sm" title="Programar">
                                            <i class="fas fa-clock"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm" title="Historial">
                                            <i class="fas fa-history"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-success btn-sm" title="Modo Auto">
                                            <i class="fas fa-robot"></i> Auto
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <i class="fas fa-border-style"></i>
                            </div>
                            <h4 class="text-muted mb-3">No hay cortinas registradas</h4>
                            <p class="text-muted mb-4">Comienza agregando la primera cortina al sistema</p>
                            <button class="btn btn-primary-custom btn-cortinas">
                                <i class="fas fa-plus me-2"></i>Agregar Primera Cortina
                            </button>
                        </div>
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
                        <i class="fas fa-info-circle me-2"></i>Beneficios del Control
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning border-0">
                        <i class="fas fa-sun me-2"></i>
                        <strong>Tip:</strong> El control automático optimiza el uso de luz natural.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Reduce el consumo de electricidad</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Mejora el confort visual</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Regula la temperatura interior</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Estadísticas de Uso
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="mb-3">
                            <h4 class="text-warning" id="ahorro-energetico">35%</h4>
                            <small class="text-muted">Ahorro energético mensual</small>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-warning" style="width: 35%"></div>
                        </div>
                        <small class="text-muted">Gracias al uso optimizado de luz natural</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ajustarCortina(cortinaId, nivel) {
        const slider = document.getElementById(`nivel-slider-${cortinaId}`);
        const display = document.getElementById(`nivel-display-${cortinaId}`);
        const badge = document.getElementById(`estado-${cortinaId}`);
        
        slider.value = nivel;
        display.textContent = nivel + '%';
        
        // Actualizar estado
        if (nivel === 0) {
            badge.className = 'badge badge-cerrada';
            badge.textContent = 'Cerrada';
        } else if (nivel === 100) {
            badge.className = 'badge badge-abierta';
            badge.textContent = 'Abierta';
        } else {
            badge.className = 'badge bg-info';
            badge.textContent = 'Parcial';
        }
        
        updateCortinaStats();
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Control de sliders
        document.querySelectorAll('input[type="range"]').forEach(slider => {
            if (slider.id !== 'nivel-global') {
                slider.addEventListener('input', function() {
                    const cortinaId = this.id.replace('nivel-slider-', '');
                    const display = document.getElementById(`nivel-display-${cortinaId}`);
                    const badge = document.getElementById(`estado-${cortinaId}`);
                    
                    display.textContent = this.value + '%';
                    
                    // Actualizar estado según el nivel
                    if (this.value == 0) {
                        badge.className = 'badge badge-cerrada';
                        badge.textContent = 'Cerrada';
                    } else if (this.value == 100) {
                        badge.className = 'badge badge-abierta';
                        badge.textContent = 'Abierta';
                    } else {
                        badge.className = 'badge bg-info';
                        badge.textContent = 'Parcial';
                    }
                });
            }
        });
        
        // Control global de nivel
        document.getElementById('nivel-global').addEventListener('input', function() {
            const nivel = this.value;
            document.querySelectorAll('input[type="range"]').forEach(slider => {
                if (slider.id !== 'nivel-global') {
                    slider.value = nivel;
                    const cortinaId = slider.id.replace('nivel-slider-', '');
                    document.getElementById(`nivel-display-${cortinaId}`).textContent = nivel + '%';
                    
                    const badge = document.getElementById(`estado-${cortinaId}`);
                    if (nivel == 0) {
                        badge.className = 'badge badge-cerrada';
                        badge.textContent = 'Cerrada';
                    } else if (nivel == 100) {
                        badge.className = 'badge badge-abierta';
                        badge.textContent = 'Abierta';
                    } else {
                        badge.className = 'badge bg-info';
                        badge.textContent = 'Parcial';
                    }
                }
            });
            updateCortinaStats();
        });
        
        // Controles globales
        document.getElementById('abrir-todas').addEventListener('click', function() {
            document.querySelectorAll('input[type="range"]').forEach(slider => {
                if (slider.id !== 'nivel-global') {
                    slider.value = 100;
                    const cortinaId = slider.id.replace('nivel-slider-', '');
                    document.getElementById(`nivel-display-${cortinaId}`).textContent = '100%';
                    const badge = document.getElementById(`estado-${cortinaId}`);
                    badge.className = 'badge badge-abierta';
                    badge.textContent = 'Abierta';
                }
            });
            document.getElementById('nivel-global').value = 100;
            updateCortinaStats();
        });
        
        document.getElementById('cerrar-todas').addEventListener('click', function() {
            document.querySelectorAll('input[type="range"]').forEach(slider => {
                if (slider.id !== 'nivel-global') {
                    slider.value = 0;
                    const cortinaId = slider.id.replace('nivel-slider-', '');
                    document.getElementById(`nivel-display-${cortinaId}`).textContent = '0%';
                    const badge = document.getElementById(`estado-${cortinaId}`);
                    badge.className = 'badge badge-cerrada';
                    badge.textContent = 'Cerrada';
                }
            });
            document.getElementById('nivel-global').value = 0;
            updateCortinaStats();
        });
        
        // Control individual de cortinas
        document.querySelectorAll('.toggle-cortina').forEach(button => {
            button.addEventListener('click', function() {
                const cortinaId = this.getAttribute('data-cortina-id');
                const estadoActual = this.getAttribute('data-estado-actual');
                const slider = document.getElementById(`nivel-slider-${cortinaId}`);
                const badge = document.getElementById(`estado-${cortinaId}`);
                const boton = this;
                
                if (estadoActual === 'Abierta') {
                    // Cerrar cortina
                    slider.value = 0;
                    document.getElementById(`nivel-display-${cortinaId}`).textContent = '0%';
                    badge.className = 'badge badge-cerrada';
                    badge.textContent = 'Cerrada';
                    boton.innerHTML = '<i class="fas fa-power-off me-1"></i>Abrir';
                    boton.setAttribute('data-estado-actual', 'Cerrada');
                } else {
                    // Abrir cortina
                    slider.value = 100;
                    document.getElementById(`nivel-display-${cortinaId}`).textContent = '100%';
                    badge.className = 'badge badge-abierta';
                    badge.textContent = 'Abierta';
                    boton.innerHTML = '<i class="fas fa-power-off me-1"></i>Cerrar';
                    boton.setAttribute('data-estado-actual', 'Abierta');
                }
                
                updateCortinaStats();
            });
        });
        
        // Actualizar estadísticas
        function updateCortinaStats() {
            const totalCortinas = document.querySelectorAll('.cortina-card').length;
            const cortinasAbiertas = document.querySelectorAll('.badge-abierta').length;
            const cortinasAutomaticas = Math.floor(totalCortinas * 0.6); // 60% en automático
            
            document.getElementById('total-cortinas').textContent = totalCortinas;
            document.getElementById('cortinas-abiertas').textContent = cortinasAbiertas;
            document.getElementById('cortinas-automaticas').textContent = cortinasAutomaticas;
        }
        
        updateCortinaStats();
    });
</script>
@endsection