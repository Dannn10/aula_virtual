@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Docentes</h1>
    <a href="{{ route('docentes.create') }}" class="btn btn-primary mb-3">➕ Nuevo Docente</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($docentes as $docente)
                <tr>
                    <td>{{ $docente->id }}</td>
                    <td>{{ $docente->nombre }}</td>
                    <td>{{ $docente->apellido }}</td>
                    <td>{{ $docente->email }}</td>
                    <td>
                        <a href="{{ route('docentes.show', $docente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('docentes.destroy', $docente) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No hay docentes registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
