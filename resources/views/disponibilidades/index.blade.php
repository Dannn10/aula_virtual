@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Disponibilidades</h1>
    <a href="{{ route('disponibilidades.create') }}" class="btn btn-primary mb-3">➕ Nueva Disponibilidad</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Docente</th><th>Día</th><th>Hora Inicio</th><th>Hora Fin</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($disponibilidades as $disponibilidad)
                <tr>
                    <td>{{ $disponibilidad->id }}</td>
                    <td>{{ $disponibilidad->docente->nombre }} {{ $disponibilidad->docente->apellido }}</td>
                    <td>{{ $disponibilidad->dia }}</td>
                    <td>{{ $disponibilidad->hora_inicio }}</td>
                    <td>{{ $disponibilidad->hora_fin }}</td>
                    <td>
                        <a href="{{ route('disponibilidades.show', $disponibilidad) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('disponibilidades.edit', $disponibilidad) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('disponibilidades.destroy', $disponibilidad) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No hay disponibilidades registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
