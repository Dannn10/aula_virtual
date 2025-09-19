@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle Cortina</h1>
    <p><strong>ID:</strong> {{ $cortina->id }}</p>
    <p><strong>Aula:</strong> {{ $cortina->aula->nombre ?? 'Sin aula' }}</p>
    <p><strong>Estado:</strong> {{ $cortina->estado }}</p>
    <a href="{{ route('cortinas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
