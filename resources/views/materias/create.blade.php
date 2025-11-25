@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Nueva Materia</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('materias.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Materia</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Matemática" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Escribe una breve descripción..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('materias.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar Materia</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
