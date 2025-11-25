@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="mb-3 fw-bold">Nuevo Estudiante</h3>

        <form action="{{ route('estudiantes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>

    </div>
</div>
@endsection
