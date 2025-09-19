<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aula Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Aula Virtual</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('aulas.index') }}">Aulas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('materias.index') }}">Materias</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('docentes.index') }}">Docentes</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('disponibilidades.index') }}">Disponibilidades</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('horarios.index') }}">Horarios</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('focos.index') }}">Focos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('historialfocos.index') }}">Historial Focos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('airesacondicionados.index') }}">Aires Acond.</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('historialusoaireacondicionados.index') }}">Historial Aires</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cortinas.index') }}">Cortinas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('muebles.index') }}">Muebles</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container">
        @yield('content')
    </div>

  <!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@stack('scripts')
</body>
</html>
