@if(session('success'))
    <div id="alertSuccess" class="alert alert-success">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const alert = document.getElementById('alertSuccess');
            if (alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000); // 3 segundos
    </script>
@endif

@extends('layouts.app') {{-- Usa tu layout principal si lo tenés --}}

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Materias</h1>
        <a href="{{ route('materias.create') }}" class="btn btn-primary">➕ Nueva Materia</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover text-center align-middle shadow-sm mt-3">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Materia</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($materias as $materia)
        <tr>
            <td>{{ $materia->id }}</td>
            <td>{{ $materia->nombre }}</td>

            {{-- Mostrar descripción o un texto si está vacía --}}
            <td>{{ $materia->descripcion ?? 'Sin descripción' }}</td>

            <td>
                <a href="{{ route('materias.show', $materia) }}" class="btn btn-info btn-sm">👁 Ver</a>
                <a href="{{ route('materias.edit', $materia) }}" class="btn btn-warning btn-sm">✏ Editar</a>

                <form action="{{ route('materias.destroy', $materia) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">
                        🗑 Eliminar
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>
</div>
@endsection
