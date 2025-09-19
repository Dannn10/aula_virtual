@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Aula</h1>
    <p><strong>Nombre:</strong> {{ $aula->nombre }}</p>
    <p><strong>Capacidad:</strong> {{ $aula->capacidad }}</p>
    <a href="{{ route('aulas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
