@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Aula</h1>
    <form action="{{ route('aulas.update', $aula->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="{{ $aula->nombre }}" required>
        </div>
        <div class="mb-3">
            <label>Capacidad:</label>
            <input type="number" name="capacidad" class="form-control" value="{{ $aula->capacidad }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
