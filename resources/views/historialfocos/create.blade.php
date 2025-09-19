@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nuevo Registro de Foco</h1>
    <form action="{{ route('historialfocos.store') }}" method="POST">@csrf
        <div class="mb-3"><label>Foco</label>
            <select name="foco_id" class="form-control">
                @foreach($focos as $foco)
                    <option value="{{ $foco->id }}">{{ $foco->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Acción</label>
            <select name="accion" class="form-control">
                <option value="encender">Encender</option>
                <option value="apagar">Apagar</option>
            </select>
        </div>
        <div class="mb-3"><label>Fecha</label>
            <input type="date" name="fecha" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
