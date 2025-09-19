@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Cortina</h1>
    <form action="{{ route('cortinas.update',$cortina->id) }}" method="POST">@csrf @method('PUT')
        <div class="mb-3"><label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $cortina->nombre }}">
        </div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                <option value="abierta" {{ $cortina->estado=='abierta'?'selected':'' }}>Abierta</option>
                <option value="cerrada" {{ $cortina->estado=='cerrada'?'selected':'' }}>Cerrada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
