@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Nueva Cortina</h1>
    <form action="{{ route('cortinas.store') }}" method="POST">@csrf
        <div class="mb-3"><label>Nombre</label><input type="text" name="nombre" class="form-control"></div>
        <div class="mb-3"><label>Estado</label>
            <select name="estado" class="form-control">
                <option value="abierta">Abierta</option>
                <option value="cerrada">Cerrada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
