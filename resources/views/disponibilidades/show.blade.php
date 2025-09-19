@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Disponibilidad</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><b>ID:</b> {{ $disponibilidad->id }}</li>
        <li class="list-group-item"><b>Docente:</b> {{ $disponibilidad->docente->nombre }} {{ $disponibilidad->docente->apellido }}</li>
        <li class="list-group-item"><b>Día:</b> {{ $disponibilidad->dia }}</li>
        <li class="list-group-item"><b>Hora Inicio:</b> {{ $disponibilidad->hora_inicio }}</li>
        <li class="list-group-item"><b>Hora Fin:</b> {{ $disponibilidad->hora_fin }}</li>
    </ul>

    <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('disponibilidades.edit', $disponibilidad) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
