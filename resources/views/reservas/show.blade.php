@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle de Reserva</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><b>ID:</b> {{ $reserva->id }}</li>
        <li class="list-group-item"><b>Docente:</b> {{ $reserva->docente->nombre }} {{ $reserva->docente->apellido }}</li>
        <li class="list-group-item"><b>Aula:</b> {{ $reserva->aula }}</li>
        <li class="list-group-item"><b>Fecha:</b> {{ $reserva->fecha }}</li>
    </ul>

    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-warning">Editar</a>
</div>
@endsection
