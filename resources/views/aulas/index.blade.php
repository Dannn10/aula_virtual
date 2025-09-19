@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Aulas</h1>
        <a href="{{ route('aulas.create') }}" class="btn btn-primary">➕ Nueva Aula</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Capacidad</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aulas as $aula)
                        <tr>
                            <td>{{ $aula->id }}</td>
                            <td>{{ $aula->nombre }}</td>
                            <td>{{ $aula->capacidad }}</td>
                            <td class="text-center">
                                <a href="{{ route('aulas.show', $aula->id) }}" class="btn btn-sm btn-info">👁 Ver</a>
                                <a href="{{ route('aulas.edit', $aula->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                <form action="{{ route('aulas.destroy', $aula->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta aula?')">🗑 Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay aulas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
