@extends('layouts.app')

@section('content')
<style>
    .focos-header { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .btn-focos { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .badge-encendido { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .badge-apagado { background: linear-gradient(135deg, #6b7280, #4b5563); }
    .foco-card { border-left: 4px solid #f59e0b; transition: all 0.3s ease; }
    .foco-card:hover { transform: translateY(-3px); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header focos-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-lightbulb me-3"></i>Control de Focos
                </h1>
                <p class="section-subtitle">Gestioná el encendido y control de iluminación en las aulas</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-bolt me-2"></i>Control Inteligente
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="total-focos">0</div>
                <div class="stats-label">Total de Focos</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="focos-encendidos">0</div>
                <div class="stats-label">Focos Encendidos</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="focos-apagados">0</div>
                <div class="stats-label">Focos Apagados</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="consumo-actual">0W</div>
                <div class="stats-label">Consumo Actual</div>
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
                <div class="col-md-4">
                    <button class="btn btn-success w-100 py-2" id="encender-todos">
                        <i class="fas fa-power-off me-2"></i>Encender Todos
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-danger w-100 py-2" id="apagar-todos">
                        <i class="fas fa-power-off me-2"></i>Apagar Todos
                    </button>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">Auto</span>
                        <select class="form-select" id="modo-automatico">
                            <option value="off">Desactivado</option>
                            <option value="horario">Por Horario</option>
                            <option value="sensor">Por Sensor</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Focos -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-th me-2"></i>Estado de Focos por Aula
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar aula o foco...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-focos w-100">
                                <i class="fas fa-plus me-2"></i>Nuevo Foco
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row g-3" id="grid-focos">
                @if($focos && count($focos) > 0)
                    @foreach($focos as $foco)
                    <div class="col-md-4">
                        <div class="foco-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-0">{{ $foco->nombre }}</h5>
                                    <span class="badge {{ $foco->estado ? 'badge-encendido' : 'badge-apagado' }}" id="estado-{{ $foco->id }}">
                                        {{ $foco->estado ? 'ENCENDIDO' : 'APAGADO' }}
                                    </span>
                                </div>
                                
                                <div class="foco-info mb-3">
                                    <div class="row small text-muted">
                                        <div class="col-6">
                                            <i class="fas fa-door-open me-1"></i>
                                            {{ $foco->aula->nombre }}
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-bolt me-1"></i>
                                            {{ $foco->potencia }}W
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Indicador Visual -->
                                <div class="foco-indicador text-center mb-3">
                                    <i class="fas fa-lightbulb {{ $foco->estado ? 'text-warning' : 'text-secondary' }}" 
                                       id="icono-{{ $foco->id }}"
                                       style="font-size: 3rem; filter: {{ $foco->estado ? 'drop-shadow(0 0 10px rgba(245, 158, 11, 0.5))' : 'none' }}"></i>
                                </div>
                                
                                <!-- Controles -->
                                <div class="d-grid gap-2">
                                    <button class="btn {{ $foco->estado ? 'btn-outline-warning' : 'btn-warning' }} btn-sm toggle-foco" 
                                            data-foco-id="{{ $foco->id }}"
                                            data-estado-actual="{{ $foco->estado }}">
                                        <i class="fas fa-power-off me-1"></i>
                                        {{ $foco->estado ? 'Apagar' : 'Encender' }}
                                    </button>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-info btn-sm" title="Configurar">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <button class="btn btn-outline-primary btn-sm" title="Historial">
                                            <i class="fas fa-history"></i>
                                        </button>
                                        <button class="btn btn-outline-danger btn-sm" title="Eliminar">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Información Adicional -->
                                <div class="mt-3 pt-3 border-top">
                                    <div class="row small text-muted">
                                        <div class="col-12">
                                            <i class="fas fa-clock me-1"></i>
                                            Último cambio: {{ $foco->ultimo_cambio ?? 'Nunca' }}
                                        </div>
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
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h4 class="text-muted mb-3">No hay focos registrados</h4>
                            <p class="text-muted mb-4">Comienza agregando el primer foco al sistema</p>
                            <button class="btn btn-primary-custom btn-focos">
                                <i class="fas fa-plus me-2"></i>Agregar Primer Foco
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
                        <i class="fas fa-info-circle me-2"></i>Control de Iluminación
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning border-0">
                        <i class="fas fa-lightbulb me-2"></i>
                        <strong>Tip:</strong> Los focos pueden programarse para encenderse automáticamente.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Control individual por aula</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Programación por horarios</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Monitoreo de consumo energético</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Estadísticas de Consumo
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="mb-3">
                            <h4 class="text-warning" id="consumo-total">0 kWh</h4>
                            <small class="text-muted">Consumo total del mes</small>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                        </div>
                        <small class="text-muted">65% del presupuesto mensual</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Control individual de focos
        document.querySelectorAll('.toggle-foco').forEach(button => {
            button.addEventListener('click', function() {
                const focoId = this.getAttribute('data-foco-id');
                const estadoActual = this.getAttribute('data-estado-actual') === '1';
                
                // Simular cambio de estado
                const nuevoEstado = !estadoActual;
                
                // Actualizar interfaz
                const badge = document.getElementById(`estado-${focoId}`);
                const icono = document.getElementById(`icono-${focoId}`);
                const boton = this;
                
                if (nuevoEstado) {
                    badge.className = 'badge badge-encendido';
                    badge.textContent = 'ENCENDIDO';
                    icono.className = 'fas fa-lightbulb text-warning';
                    icono.style.filter = 'drop-shadow(0 0 10px rgba(245, 158, 11, 0.5))';
                    boton.className = 'btn btn-outline-warning btn-sm toggle-foco';
                    boton.innerHTML = '<i class="fas fa-power-off me-1"></i>Apagar';
                } else {
                    badge.className = 'badge badge-apagado';
                    badge.textContent = 'APAGADO';
                    icono.className = 'fas fa-lightbulb text-secondary';
                    icono.style.filter = 'none';
                    boton.className = 'btn btn-warning btn-sm toggle-foco';
                    boton.innerHTML = '<i class="fas fa-power-off me-1"></i>Encender';
                }
                
                boton.setAttribute('data-estado-actual', nuevoEstado ? '1' : '0');
                
                // Actualizar estadísticas
                updateFocoStats();
            });
        });
        
        // Controles globales
        document.getElementById('encender-todos').addEventListener('click', function() {
            document.querySelectorAll('.toggle-foco').forEach(btn => {
                if (btn.getAttribute('data-estado-actual') === '0') {
                    btn.click();
                }
            });
        });
        
        document.getElementById('apagar-todos').addEventListener('click', function() {
            document.querySelectorAll('.toggle-foco').forEach(btn => {
                if (btn.getAttribute('data-estado-actual') === '1') {
                    btn.click();
                }
            });
        });
        
        // Actualizar estadísticas
        function updateFocoStats() {
            const totalFocos = document.querySelectorAll('.foco-card').length;
            const focosEncendidos = document.querySelectorAll('.badge-encendido').length;
            const focosApagados = totalFocos - focosEncendidos;
            const consumo = focosEncendidos * 60; // 60W por foco
            
            document.getElementById('total-focos').textContent = totalFocos;
            document.getElementById('focos-encendidos').textContent = focosEncendidos;
            document.getElementById('focos-apagados').textContent = focosApagados;
            document.getElementById('consumo-actual').textContent = consumo + 'W';
            document.getElementById('consumo-total').textContent = Math.round(consumo * 24 * 30 / 1000) + ' kWh';
        }
        
        // Inicializar estadísticas
        updateFocoStats();
    });
</script>
@endsection