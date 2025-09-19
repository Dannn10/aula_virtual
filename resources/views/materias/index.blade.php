@extends('layouts.app') {{-- Usa tu layout principal si lo tenés --}}

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Listado de Materias</h1>
        <a href="{{ route('materias.create') }}" class="btn btn-primary">➕ Nueva Materia</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($materias as $materia)
                        <tr>
                            <td>{{ $materia->id }}</td>
                            <td>{{ $materia->nombre }}</td>
                            <td>{{ $materia->descripcion }}</td>
                            <td class="text-center">
                                <a href="{{ route('materias.show', $materia->id) }}" class="btn btn-sm btn-info">👁 Ver</a>
                                <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                                <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que quieres eliminar esta materia?')">🗑 Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay materias registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
