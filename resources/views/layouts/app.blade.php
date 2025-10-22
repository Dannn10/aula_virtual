<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aula Virtual</title>

    <!-- Scripts (Asegúrate de tener Vite o el JS que uses) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- O si usas Bootstrap por CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
                Aula Virtual
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                    {{-- ESTA ES LA LÓGICA CLAVE --}}
                    @auth
                        {{-- Si el usuario ESTÁ autenticado --}}
                        <li class="nav-item">
                            <span class="navbar-text me-3">
                                Hola, {{ Auth::user()->name }}
                            </span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Cerrar Sesión</button>
                            </form>
                        </li>
                    @else
                        {{-- Si el usuario es un INVITADO --}}
                        <li class="nav-item">
                            <a class="btn btn-outline-light btn-sm me-2" href="{{ route('login') }}">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-light btn-sm" href="{{ route('register') }}">Registrarse</a>
                        </li>
                    @endauth
                    {{-- FIN DE LA LÓGICA --}}

                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
