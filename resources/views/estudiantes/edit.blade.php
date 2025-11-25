@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="fw-bold mb-4">Editar Estudiante</h3>

        <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" 
                       name="nombre" 
                       class="form-control" 
                       value="{{ old('nombre', $estudiante->nombre) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" 
                       name="apellido" 
                       class="form-control" 
                       value="{{ old('apellido', $estudiante->apellido) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" 
                       name="email" 
                       class="form-control" 
                       value="{{ old('email', $estudiante->email) }}"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</div>
@endsection
