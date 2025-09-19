@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detalle de la Cortina</h1>
    <p><strong>Nombre:</strong> {{ $cortina->nombre }}</p>
    <p><strong>Estado:</strong> {{ $cortina->estado }}</p>
    <a href="{{ route('cortinas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
