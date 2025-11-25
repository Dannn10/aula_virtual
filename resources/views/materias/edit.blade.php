@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">✏️ Editar Materia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('materias.update', $materia) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nombre de la Materia</label>
                    <input type="text" name="nombre" value="{{ $materia->nombre }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="3">{{ $materia->descripcion }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('materias.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
