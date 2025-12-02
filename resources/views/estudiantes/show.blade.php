@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Estudiante</h1>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $estudiante->nombre }}</h5>
            <p class="card-text"><strong>DNI:</strong> {{ $estudiante->dni }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $estudiante->email }}</p>
        </div>
    </div>

    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
</div>
@endsection
