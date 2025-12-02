<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aula Virtual</title>

    {{-- CSS y JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4bb543;
            --warning: #ffcc00;
            --danger: #dc3545;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fb, #e3f2fd);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
        }
        
        .navbar-brand {
            letter-spacing: 0.5px;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: white;
        }
        
        .btn-light {
            background-color: white;
            color: var(--primary);
            border: none;
        }
        
        .btn-light:hover {
            background-color: #f8f9fa;
            color: var(--secondary);
        }
        
        .btn-danger {
            background-color: var(--danger);
            border: none;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-1px);
        }
        
        footer {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: #bbb;
            padding: 15px 0;
            font-size: 0.9rem;
            margin-top: 3rem;
        }
        
        /* Estilos para páginas de autenticación */
        .auth-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .auth-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }
        
        .auth-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .auth-body {
            padding: 2rem;
        }
        
        .form-control {
            border-radius: 8px;
            border: 1px solid var(--light-gray);
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .auth-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            color: white;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s;
        }
        
        .auth-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .auth-links {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }
        
        .auth-links a {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .auth-links a:hover {
            text-decoration: underline;
        }

        /* ===== ESTILOS PARA LAS SECCIONES DEL SISTEMA ===== */
        
        /* Colores adicionales para todas las secciones */
        .bg-cyan { background-color: #06b6d4 !important; }
        .bg-purple { background-color: #8b5cf6 !important; }
        .bg-pink { background-color: #ec4899 !important; }
        .bg-brown { background-color: #78716c !important; }

        .text-cyan { color: #06b6d4 !important; }
        .text-purple { color: #8b5cf6 !important; }
        .text-pink { color: #ec4899 !important; }
        .text-brown { color: #78716c !important; }

        .btn-outline-cyan { 
            border-color: #06b6d4; 
            color: #06b6d4;
        }
        .btn-outline-purple { 
            border-color: #8b5cf6; 
            color: #8b5cf6;
        }
        .btn-outline-pink { 
            border-color: #ec4899; 
            color: #ec4899;
        }
        .btn-outline-brown { 
            border-color: #78716c; 
            color: #78716c;
        }

        .btn-outline-cyan:hover,
        .btn-outline-purple:hover,
        .btn-outline-pink:hover,
        .btn-outline-brown:hover {
            background-color: inherit;
            color: inherit;
            opacity: 0.8;
        }

        /* Estilos comunes para todas las secciones */
        .section-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(67, 97, 238, 0.3);
        }
        
        .section-title {
            font-weight: 800;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        
        .section-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            font-weight: 300;
        }
        
        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .stats-card:hover {
            transform: translateY(-5px);
        }
        
        .stats-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
        }
        
        .stats-label {
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .main-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        
        .card-header-custom {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-bottom: 1px solid #dee2e6;
            padding: 1.5rem 2rem;
        }
        
        .card-title {
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
            font-size: 1.3rem;
        }
        
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .table-custom {
            margin: 0;
        }
        
        .table-custom thead th {
            background: #f8f9fa;
            border-bottom: 2px solid var(--primary);
            font-weight: 700;
            color: #2c3e50;
            padding: 1rem;
        }
        
        .table-custom tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f1f3f4;
        }
        
        .table-custom tbody tr:hover {
            background-color: #f8f9ff;
        }
        
        .badge-capacity {
            background: linear-gradient(135deg, #4cc9f0, #4361ee);
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .btn-action {
            border-radius: 8px;
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            margin: 0 0.2rem;
            transition: all 0.3s ease;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--gray);
        }
        
        .empty-state-icon {
            font-size: 4rem;
            color: #dee2e6;
            margin-bottom: 1rem;
        }
        
        .search-box {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .search-box:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        /* Badges específicos para diferentes estados */
        .badge-encendido { background: linear-gradient(135deg, #10b981, #047857); }
        .badge-apagado { background: linear-gradient(135deg, #6b7280, #4b5563); }
        .badge-disponible { background: linear-gradient(135deg, #10b981, #047857); }
        .badge-ocupado { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .badge-mantenimiento { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .badge-danado { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .badge-enfriamiento { background: linear-gradient(135deg, #06b6d4, #0891b2); }
        .badge-calentamiento { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .badge-abierta { background: linear-gradient(135deg, #f97316, #ea580c); }
        .badge-cerrada { background: linear-gradient(135deg, #6b7280, #4b5563); }

        /* Cards específicas */
        .mueble-card,
        .cortina-card,
        .aire-card,
        .foco-card,
        .historial-card {
            border-left: 4px solid;
            transition: all 0.3s ease;
        }

        .mueble-card:hover,
        .cortina-card:hover,
        .aire-card:hover,
        .foco-card:hover,
        .historial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        /* Alertas personalizadas */
        .alert-cyan {
            background-color: rgba(6, 182, 212, 0.1);
            border-left: 4px solid #06b6d4;
        }

        .alert-purple {
            background-color: rgba(139, 92, 246, 0.1);
            border-left: 4px solid #8b5cf6;
        }

        .alert-brown {
            background-color: rgba(120, 113, 108, 0.1);
            border-left: 4px solid #78716c;
        }

        /* Mejoras responsive */
        @media (max-width: 768px) {
            .section-title {
                font-size: 1.8rem !important;
            }
            
            .stats-number {
                font-size: 2rem !important;
            }
            
            .card-header-custom .row {
                flex-direction: column;
                gap: 1rem;
            }
            
            .card-header-custom .col-md-6 {
                text-align: left !important;
            }
            
            .search-box {
                margin-bottom: 1rem;
            }

            .section-header .row {
                text-align: center;
            }

            .section-header .badge {
                margin-top: 1rem;
            }
        }

        /* Animaciones suaves para todos los elementos interactivos */
        .stats-card,
        .mueble-card,
        .cortina-card,
        .aire-card,
        .foco-card,
        .historial-card {
            transition: all 0.3s ease;
        }

        /* Efectos hover mejorados */
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        /* Iconos personalizados */
        .fa-shelves:before {
            content: "📚";
            font-style: normal;
        }

        /* Utilidades adicionales */
        .consumo-chart {
            height: 200px;
            background: linear-gradient(180deg, #f8fafc, #e2e8f0);
            border-radius: 10px;
        }

        .temp-control {
            background: linear-gradient(135deg, #e0f2fe, #bae6fd);
        }

        .control-cortina {
            background: linear-gradient(135deg, #ffedd5, #fed7aa);
        }

        .inventory-card {
            background: linear-gradient(135deg, #f5f5f4, #e7e5e4);
        }

        .schedule-day {
            border-left: 4px solid var(--primary);
        }

        .availability-card {
            border-left: 4px solid var(--primary);
        }

        /* Paginación personalizada */
        .card-footer-custom {
            background: #f8f9fa;
            padding: 1rem 2rem;
            border-top: 1px solid #dee2e6;
        }

        /* Estados de carga */
        .loading-state {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        .spinner-custom {
            width: 3rem;
            height: 3rem;
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                <i class="fas fa-graduation-cap me-2"></i>Aula Virtual
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    {{-- Autenticación --}}
                    @auth
                        <li class="nav-item">
                            <span class="navbar-text text-light me-3">
                                <i class="fas fa-user me-1"></i> Hola, <strong>{{ Auth::user()->name }}</strong>
                            </span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm me-2" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Iniciar Sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light btn-sm" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Registrarse
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- Contenido dinámico --}}
    <main class="container py-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="text-center mt-5 py-3">
        <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 15px;">
            <i class="fas fa-graduation-cap me-2"></i>© {{ date('Y') }} Aula Virtual - Sistema de Gestión Educativa
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>