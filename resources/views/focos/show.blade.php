@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detalle del Foco</h1>
    <p><strong>Nombre:</strong> {{ $foco->nombre }}</p>
    <p><strong>Estado:</strong> {{ $foco->estado }}</p>
    <a href="{{ route('focos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
