@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Foco</h1>
    <form action="{{ route('focos.update',$foco->id) }}" method="POST">@csrf @method('PUT')
        <div class="mb-3"><label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $foco->nombre }}">
        </div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                <option value="encendido" {{ $foco->estado=='encendido'?'selected':'' }}>Encendido</option>
                <option value="apagado" {{ $foco->estado=='apagado'?'selected':'' }}>Apagado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
