@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detalle del Historial de Foco</h1>
    <p><strong>Foco:</strong> {{ $historial->foco->nombre }}</p>
    <p><strong>Acción:</strong> {{ $historial->accion }}</p>
    <p><strong>Fecha:</strong> {{ $historial->fecha }}</p>
    <a href="{{ route('historialfocos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
