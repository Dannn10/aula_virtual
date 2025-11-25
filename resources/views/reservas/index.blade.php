@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">📘 Listado de Reservas</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('reservas.create') }}" class="btn btn-success mb-3">➕ Nueva Reserva</a>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Docente</th>
                        <th>Aula</th>
                        <th>Materia</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->docente->nombre ?? '-' }} {{ $reserva->docente->apellido ?? '' }}</td>
                            <td>{{ $reserva->aula->nombre ?? 'Sin aula' }}</td>
                            <td>{{ $reserva->materia->nombre ?? 'Sin materia' }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-info btn-sm">👁️ Ver</a>
                                <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar esta reserva?')">🗑️ Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($reservas->isEmpty())
                <div class="text-center mt-4">
                    <p class="text-muted">No hay reservas registradas.</p>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Script para ocultar mensajes de éxito automáticamente --}}
<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) alert.remove();
    }, 3000);
</script>
@endsection
