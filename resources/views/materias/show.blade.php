@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">📘 Detalles de la Materia</h4>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $materia->nombre }}</p>

            <a href="{{ route('materias.index') }}" class="btn btn-secondary">⬅️ Volver</a>
        </div>
    </div>
</div>
@endsection
