@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">👁 Detalle del Aula</h4>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $aula->id }}</p>
            <p><strong>Nombre:</strong> {{ $aula->nombre }}</p>
            <p><strong>Capacidad:</strong> {{ $aula->capacidad }}</p>

            <a href="{{ route('aulas.index') }}" class="btn btn-secondary">⬅️ Volver</a>
        </div>
    </div>
</div>
@endsection
