@extends('layouts.app')

@section('content')
<style>
    .muebles-header { background: linear-gradient(135deg, #78716c, #57534e); }
    .btn-muebles { background: linear-gradient(135deg, #78716c, #57534e); }
    .badge-disponible { background: linear-gradient(135deg, #10b981, #047857); }
    .badge-mantenimiento { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .badge-danado { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .mueble-card { border-left: 4px solid #78716c; transition: all 0.3s ease; }
    .mueble-card:hover { transform: translateY(-3px); }
    .inventory-card { background: linear-gradient(135deg, #f5f5f4, #e7e5e4); }
</style>

<div class="container">
    <!-- Header de la Sección -->
    <div class="section-header muebles-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title">
                    <i class="fas fa-couch me-3"></i>Inventario de Muebles
                </h1>
                <p class="section-subtitle">Gestioná el inventario y estado de los muebles en las aulas</p>
            </div>
            <div class="col-md-4 text-end">
                <span class="badge bg-light text-dark fs-6 p-3">
                    <i class="fas fa-boxes me-2"></i>Gestión de Activos
                </span>
            </div>
        </div>
    </div>

    <!-- Estadísticas -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="total-muebles">0</div>
                <div class="stats-label">Total de Muebles</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="muebles-disponibles">0</div>
                <div class="stats-label">Disponibles</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="muebles-mantenimiento">0</div>
                <div class="stats-label">En Mantenimiento</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <div class="stats-number" id="valor-total">$0</div>
                <div class="stats-label">Valor Total</div>
            </div>
        </div>
    </div>

    <!-- Filtros Rápidos -->
    <div class="main-card mb-4">
        <div class="card-header-custom">
            <h5 class="card-title mb-0">
                <i class="fas fa-filter me-2"></i>Filtros de Inventario
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Tipo de Mueble</label>
                    <select class="form-select" id="filtro-tipo">
                        <option value="">Todos los tipos</option>
                        <option>Silla</option>
                        <option>Mesa</option>
                        <option>Escritorio</option>
                        <option>Estante</option>
                        <option>Pizarra</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Estado</label>
                    <select class="form-select" id="filtro-estado">
                        <option value="">Todos los estados</option>
                        <option>Disponible</option>
                        <option>En uso</option>
                        <option>Mantenimiento</option>
                        <option>Dañado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Aula</label>
                    <select class="form-select" id="filtro-aula">
                        <option value="">Todas las aulas</option>
                        <option>Aula 101</option>
                        <option>Aula 102</option>
                        <option>Aula 201</option>
                        <option>Almacén</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Condición</label>
                    <select class="form-select" id="filtro-condicion">
                        <option value="">Todas las condiciones</option>
                        <option>Excelente</option>
                        <option>Buena</option>
                        <option>Regular</option>
                        <option>Mala</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-end">
                    <button class="btn btn-primary-custom btn-muebles me-2">
                        <i class="fas fa-search me-2"></i>Filtrar
                    </button>
                    <button class="btn btn-outline-secondary">
                        <i class="fas fa-redo me-2"></i>Limpiar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Resumen por Tipo -->
    <div class="main-card mb-4">
        <div class="card-header-custom">
            <h5 class="card-title mb-0">
                <i class="fas fa-chart-pie me-2"></i>Resumen por Tipo de Mueble
            </h5>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-2">
                    <div class="inventory-card p-3 rounded">
                        <i class="fas fa-chair text-brown" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">125</h5>
                        <small class="text-muted">Sillas</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inventory-card p-3 rounded">
                        <i class="fas fa-table text-brown" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">45</h5>
                        <small class="text-muted">Mesas</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inventory-card p-3 rounded">
                        <i class="fas fa-desktop text-brown" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">30</h5>
                        <small class="text-muted">Escritorios</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inventory-card p-3 rounded">
                        <i class="fas fa-shelves text-brown" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">15</h5>
                        <small class="text-muted">Estantes</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inventory-card p-3 rounded">
                        <i class="fas fa-chalkboard text-brown" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">8</h5>
                        <small class="text-muted">Pizarras</small>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="inventory-card p-3 rounded">
                        <i class="fas fa-box text-brown" style="font-size: 2rem;"></i>
                        <h5 class="mt-2">22</h5>
                        <small class="text-muted">Otros</small>
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
                        <i class="fas fa-list me-2"></i>Inventario de Muebles
                    </h3>
                </div>
                <div class="col-md-6 text-end">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" class="form-control search-box" placeholder="Buscar mueble...">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary-custom btn-muebles w-100">
                                <i class="fas fa-plus me-2"></i>Nuevo Mueble
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body p-0">
            @if($muebles && count($muebles) > 0)
                <div class="table-responsive">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th width="100">Código</th>
                                <th>Mueble</th>
                                <th width="120">Tipo</th>
                                <th width="120">Aula</th>
                                <th width="100">Estado</th>
                                <th width="100">Condición</th>
                                <th width="120">Adquisición</th>
                                <th width="120" class="text-center">Valor</th>
                                <th width="150" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($muebles as $mueble)
                            <tr>
                                <td class="fw-bold text-brown">MUE-{{ $mueble->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-brown rounded-circle p-2 me-3">
                                            <i class="fas {{ $mueble->icono }} text-white"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $mueble->nombre }}</div>
                                            <small class="text-muted">{{ $mueble->marca }} - {{ $mueble->modelo }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary">
                                        {{ $mueble->tipo }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $mueble->aula }}
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $estadoClass = [
                                            'Disponible' => 'badge-disponible',
                                            'En uso' => 'badge bg-info',
                                            'Mantenimiento' => 'badge-mantenimiento',
                                            'Dañado' => 'badge-danado'
                                        ][$mueble->estado] ?? 'badge bg-secondary';
                                    @endphp
                                    <span class="badge {{ $estadoClass }}">
                                        {{ $mueble->estado }}
                                    </span>
                                </td>
                                <td>
                                    @php
                                        $condicionClass = [
                                            'Excelente' => 'text-success',
                                            'Buena' => 'text-primary',
                                            'Regular' => 'text-warning',
                                            'Mala' => 'text-danger'
                                        ][$mueble->condicion] ?? 'text-muted';
                                    @endphp
                                    <span class="{{ $condicionClass }}">
                                        <i class="fas fa-circle me-1"></i>{{ $mueble->condicion }}
                                    </span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ $mueble->fecha_adquisicion }}</small>
                                </td>
                                <td class="text-center">
                                    <span class="fw-bold text-success">${{ number_format($mueble->valor, 2) }}</span>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-brown btn-action" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-outline-info btn-action" title="Ver Detalles">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-warning btn-action" title="Mantenimiento">
                                        <i class="fas fa-tools"></i>
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
                        <i class="fas fa-couch"></i>
                    </div>
                    <h4 class="text-muted mb-3">No hay muebles registrados</h4>
                    <p class="text-muted mb-4">Comienza agregando el primer mueble al inventario</p>
                    <button class="btn btn-primary-custom btn-muebles">
                        <i class="fas fa-plus me-2"></i>Agregar Primer Mueble
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
                        <i class="fas fa-info-circle me-2"></i>Gestión de Inventario
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-brown border-0">
                        <i class="fas fa-couch me-2"></i>
                        <strong>Tip:</strong> Mantén actualizado el estado de cada mueble.
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Registra mantenimientos preventivos</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Actualiza el estado después de reparaciones</li>
                        <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Realiza inventarios periódicos</li>
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
                            <button class="btn btn-outline-brown w-100 py-2">
                                <i class="fas fa-print me-2"></i>Inventario
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-outline-success w-100 py-2">
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
    .bg-brown { background-color: #78716c !important; }
    .text-brown { color: #78716c !important; }
    .btn-outline-brown { 
        border-color: #78716c; 
        color: #78716c;
    }
    .btn-outline-brown:hover {
        background-color: #78716c;
        color: white;
    }
    .alert-brown {
        background-color: rgba(120, 113, 108, 0.1);
        border-left: 4px solid #78716c;
    }
    .fa-shelves:before {
        content: "📚";
        font-style: normal;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simular datos de estadísticas
        function updateStats() {
            const totalMuebles = document.querySelectorAll('.mueble-card').length * 5; // Simulación
            const disponibles = Math.floor(totalMuebles * 0.8);
            const mantenimiento = Math.floor(totalMuebles * 0.1);
            const valorTotal = totalMuebles * 150; // $150 por mueble promedio
            
            document.getElementById('total-muebles').textContent = totalMuebles.toLocaleString();
            document.getElementById('muebles-disponibles').textContent = disponibles.toLocaleString();
            document.getElementById('muebles-mantenimiento').textContent = mantenimiento.toLocaleString();
            document.getElementById('valor-total').textContent = '$' + valorTotal.toLocaleString();
        }
        
        updateStats();
        
        // Asignar iconos según el tipo de mueble
        const iconMap = {
            'Silla': 'fa-chair',
            'Mesa': 'fa-table',
            'Escritorio': 'fa-desktop',
            'Estante': 'fa-shelves',
            'Pizarra': 'fa-chalkboard',
            'Otro': 'fa-box'
        };
        
        // Podrías agregar lógica para asignar iconos dinámicamente si es necesario
    });
</script>
@endsection