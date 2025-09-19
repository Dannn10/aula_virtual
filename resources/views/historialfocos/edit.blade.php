@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Registro de Foco</h1>
    <form action="{{ route('historialfocos.update',$historial->id) }}" method="POST">@csrf @method('PUT')
        <div class="mb-3"><label>Foco</label>
            <select name="foco_id" class="form-control">
                @foreach($focos as $foco)
                    <option value="{{ $foco->id }}" {{ $historial->foco_id==$foco->id?'selected':'' }}>{{ $foco->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Acción</label>
            <select name="accion" class="form-control">
                <option value="encender" {{ $historial->accion=='encender'?'selected':'' }}>Encender</option>
                <option value="apagar" {{ $historial->accion=='apagar'?'selected':'' }}>Apagar</option>
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $historial->fecha }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
