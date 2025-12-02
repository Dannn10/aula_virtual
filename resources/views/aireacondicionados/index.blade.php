@extends('layouts.app')

@section('content')
<style>
    .aires-header { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .btn-aires { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .badge-encendido { background: linear-gradient(135deg, #06b6d4, #0891b2); }
    .badge-apagado { background: linear-gradient(135deg, #6b7280, #4b5563); }
    .aire-card { border-left: 4px solid #06b6d4; transition: all 0.3s ease; }
    .aire-card:hover { transform: translateY(-3px); }
    .temp-control { background: linear-gradient(135deg, #e0f2fe, #bae6fd); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header aires-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-wind me-3"></i>Control de Aires Acondicionados
                </h1>
                <p class="section-subtitle">Gestioná la climatización de las aulas de manera inteligente</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-snowflake me-2"></i>Climatización
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="total-aires">0</div>
                <div class="stats-label">Total de Aires</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="aires-activos">0</div>
                <div class="stats-label">Aires Activos</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="temperatura-promedio">22°C</div>
                <div class="stats-label">Temp. Promedio</div>
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
                <div class="col-md-3">
                    <button class="btn btn-success w-100 py-2" id="encender-todos">
                        <i class="fas fa-power-off me-2"></i>Encender Todos
                    </button>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger w-100 py-2" id="apagar-todos">
                        <i class="fas fa-power-off me-2"></i>Apagar Todos
                    </button>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Temperatura Global</label>
                    <div class="input-group">
                        <input type="number" class="form-control" value="22" min="16" max="30" id="temp-global">
                        <span class="input-group-text">°C</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Modo Automático</label>
                    <select class="form-select" id="modo-automatico">
                        <option value="off">Desactivado</option>
                        <option value="horario">Por Horario</option>
                        <option value="temperatura">Por Temperatura</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Aires -->
    <div class="main-card">
        <div class="card-header-custom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="card-title">
                        <i class="fas fa-th me-2"></i>Estado de Aires por Aula
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar aula o aire...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-aires w-100">
                                <i class="fas fa-plus me-2"></i>Nuevo Aire
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row g-3" id="grid-aires">
                @if($aires && count($aires) > 0)
                    @foreach($aires as $aire)
                    <div class="col-md-4">
                        <div class="aire-card card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <h5 class="card-title mb-0">{{ $aire->nombre }}</h5>
                                    <span class="badge {{ $aire->estado ? 'badge-encendido' : 'badge-apagado' }}" id="estado-{{ $aire->id }}">
                                        {{ $aire->estado ? 'ENCENDIDO' : 'APAGADO' }}
                                    </span>
                                </div>
                                
                                <div class="aire-info mb-3">
                                    <div class="row small text-muted">
                                        <div class="col-6">
                                            <i class="fas fa-door-open me-1"></i>
                                            {{ $aire->aula->nombre }}
                                        </div>
                                        <div class="col-6">
                                            <i class="fas fa-bolt me-1"></i>
                                            {{ $aire->potencia }}W
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Control de Temperatura -->
                                <div class="temp-control p-3 rounded mb-3">
                                    <div class="text-center mb-2">
                                        <i class="fas fa-thermometer-half text-primary" style="font-size: 2rem;"></i>
                                    </div>
                                    <div class="text-center">
                                        <h3 class="text-primary mb-1" id="temp-display-{{ $aire->id }}">{{ $aire->temperatura }}°C</h3>
                                        <small class="text-muted">Temperatura actual</small>
                                    </div>
                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <small>16°C</small>
                                            <small>30°C</small>
                                        </div>
                                        <input type="range" class="form-range" min="16" max="30" 
                                               value="{{ $aire->temperatura }}" 
                                               id="temp-slider-{{ $aire->id }}"
                                               {{ $aire->estado ? '' : 'disabled' }}>
                                    </div>
                                </div>
                                
                                <!-- Modo y Velocidad -->
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label small">Modo</label>
                                        <select class="form-select form-select-sm" id="modo-{{ $aire->id }}" {{ $aire->estado ? '' : 'disabled' }}>
                                            <option value="cool" {{ $aire->modo == 'cool' ? 'selected' : '' }}>Frío</option>
                                            <option value="heat" {{ $aire->modo == 'heat' ? 'selected' : '' }}>Calor</option>
                                            <option value="fan" {{ $aire->modo == 'fan' ? 'selected' : '' }}>Ventilador</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small">Velocidad</label>
                                        <select class="form-select form-select-sm" id="velocidad-{{ $aire->id }}" {{ $aire->estado ? '' : 'disabled' }}>
                                            <option value="low" {{ $aire->velocidad == 'low' ? 'selected' : '' }}>Baja</option>
                                            <option value="medium" {{ $aire->velocidad == 'medium' ? 'selected' : '' }}>Media</option>
                                            <option value="high" {{ $aire->velocidad == 'high' ? 'selected' : '' }}>Alta</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- Controles -->
                                <div class="d-grid gap-2">
                                    <button class="btn {{ $aire->estado ? 'btn-outline-primary' : 'btn-primary' }} btn-sm toggle-aire" 
                                            data-aire-id="{{ $aire->id }}"
                                            data-estado-actual="{{ $aire->estado }}">
                                        <i class="fas fa-power-off me-1"></i>
                                        {{ $aire->estado ? 'Apagar' : 'Encender' }}
                                    </button>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-info btn-sm" title="Programar">
                                            <i class="fas fa-clock"></i>
                                        </button>
                                        <button class="btn btn-outline-secondary btn-sm" title="Historial">
                                            <i class="fas fa-history"></i>
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
                                <i class="fas fa-wind"></i>
                            </div>
                            <h4 class="text-muted mb-3">No hay aires registrados</h4>
                            <p class="text-muted mb-4">Comienza agregando el primer aire acondicionado al sistema</p>
                            <button class="btn btn-primary-custom btn-aires">
                                <i class="fas fa-plus me-2"></i>Agregar Primer Aire
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
                        <i class="fas fa-info-circle me-2"></i>Control de Climatización
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-primary border-0">
                        <i class="fas fa-snowflake me-2"></i>
                        <strong>Tip:</strong> La temperatura ideal para aulas es entre 22°C y 24°C.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Control individual por aula</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Programación horaria automática</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Monitoreo de consumo energético</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="main-card">
                <div class="card-header-custom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-bar me-2"></i>Eficiencia Energética
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-3">
                        <div class="mb-3">
                            <h4 class="text-primary" id="eficiencia">85%</h4>
                            <small class="text-muted">Eficiencia del sistema</small>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-primary" style="width: 85%"></div>
                        </div>
                        <small class="text-muted">Optimización basada en uso inteligente</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Control individual de aires
        document.querySelectorAll('.toggle-aire').forEach(button => {
            button.addEventListener('click', function() {
                const aireId = this.getAttribute('data-aire-id');
                const estadoActual = this.getAttribute('data-estado-actual') === '1';
                const nuevoEstado = !estadoActual;
                
                // Actualizar interfaz
                const badge = document.getElementById(`estado-${aireId}`);
                const boton = this;
                const slider = document.getElementById(`temp-slider-${aireId}`);
                const modo = document.getElementById(`modo-${aireId}`);
                const velocidad = document.getElementById(`velocidad-${aireId}`);
                
                if (nuevoEstado) {
                    badge.className = 'badge badge-encendido';
                    badge.textContent = 'ENCENDIDO';
                    boton.className = 'btn btn-outline-primary btn-sm toggle-aire';
                    boton.innerHTML = '<i class="fas fa-power-off me-1"></i>Apagar';
                    slider.disabled = false;
                    modo.disabled = false;
                    velocidad.disabled = false;
                } else {
                    badge.className = 'badge badge-apagado';
                    badge.textContent = 'APAGADO';
                    boton.className = 'btn btn-primary btn-sm toggle-aire';
                    boton.innerHTML = '<i class="fas fa-power-off me-1"></i>Encender';
                    slider.disabled = true;
                    modo.disabled = true;
                    velocidad.disabled = true;
                }
                
                boton.setAttribute('data-estado-actual', nuevoEstado ? '1' : '0');
                updateAireStats();
            });
        });
        
        // Control de temperatura
        document.querySelectorAll('input[type="range"]').forEach(slider => {
            slider.addEventListener('input', function() {
                const aireId = this.id.replace('temp-slider-', '');
                const display = document.getElementById(`temp-display-${aireId}`);
                display.textContent = this.value + '°C';
            });
        });
        
        // Controles globales
        document.getElementById('encender-todos').addEventListener('click', function() {
            document.querySelectorAll('.toggle-aire').forEach(btn => {
                if (btn.getAttribute('data-estado-actual') === '0') {
                    btn.click();
                }
            });
        });
        
        document.getElementById('apagar-todos').addEventListener('click', function() {
            document.querySelectorAll('.toggle-aire').forEach(btn => {
                if (btn.getAttribute('data-estado-actual') === '1') {
                    btn.click();
                }
            });
        });
        
        // Temperatura global
        document.getElementById('temp-global').addEventListener('change', function() {
            const temp = this.value;
            document.querySelectorAll('input[type="range"]').forEach(slider => {
                if (!slider.disabled) {
                    slider.value = temp;
                    const aireId = slider.id.replace('temp-slider-', '');
                    document.getElementById(`temp-display-${aireId}`).textContent = temp + '°C';
                }
            });
        });
        
        // Actualizar estadísticas
        function updateAireStats() {
            const totalAires = document.querySelectorAll('.aire-card').length;
            const airesActivos = document.querySelectorAll('.badge-encendido').length;
            const consumo = airesActivos * 1500; // 1500W por aire
            
            document.getElementById('total-aires').textContent = totalAires;
            document.getElementById('aires-activos').textContent = airesActivos;
            document.getElementById('consumo-actual').textContent = consumo + 'W';
        }
        
        updateAireStats();
    });
</script>
@endsection