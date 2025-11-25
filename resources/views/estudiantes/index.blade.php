@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-primary">Listado de Estudiantes</h2>
    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">
        ➕ Nuevo Estudiante
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->id }}</td>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->apellido }}</td>
                        <td>{{ $estudiante->email }}</td>
                        <td class="text-center">

                            {{-- Botón Ver --}}
                            <a href="{{ route('estudiantes.show', $estudiante->id) }}" 
                               class="btn btn-info btn-sm me-1">
                                Ver
                            </a>

                            {{-- Botón Editar --}}
                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" 
                               class="btn btn-warning btn-sm me-1">
                                Editar
                            </a>

                            {{-- Botón Eliminar --}}
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar este estudiante?')">
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            No hay estudiantes registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>
</div>
@endsection
