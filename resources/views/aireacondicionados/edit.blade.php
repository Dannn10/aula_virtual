@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cortina</h1>
    <form action="{{ route('cortinas.update', $cortina->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Aula</label>
            <input type="text" name="aula_id" class="form-control" value="{{ $cortina->aula_id }}">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control" value="{{ $cortina->estado }}">
        </div>
        <button class="btn btn-warning">Actualizar</button>
    </form>
</div>
@endsection
