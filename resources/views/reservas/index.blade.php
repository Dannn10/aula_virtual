@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Reservas</h1>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">➕ Nueva Reserva</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Docente</th><th>Aula</th><th>Fecha</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->docente->nombre }} {{ $reserva->docente->apellido }}</td>
                    <td>{{ $reserva->aula }}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>
                        <a href="{{ route('reservas.show', $reserva) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No hay reservas registradas.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
