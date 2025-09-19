@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">➕ Nueva Aula</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('aulas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Aula</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Maker" required>
                </div>

                <div class="mb-3">
                    <label for="capacidad" class="form-label">Capacidad</label>
                    <input type="number" class="form-control" id="capacidad" name="capacidad" placeholder="Ej: 30" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">⬅️ Volver</a>
                    <button type="submit" class="btn btn-success">💾 Guardar Aula</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
