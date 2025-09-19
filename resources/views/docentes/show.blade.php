@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Docente</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><b>ID:</b> {{ $docente->id }}</li>
        <li class="list-group-item"><b>Nombre:</b> {{ $docente->nombre }}</li>
        <li class="list-group-item"><b>Apellido:</b> {{ $docente->apellido }}</li>
        <li class="list-group-item"><b>Email:</b> {{ $docente->email }}</li>
    </ul>

    <a href="{{ route('docentes.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('docentes.edit', $docente) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
