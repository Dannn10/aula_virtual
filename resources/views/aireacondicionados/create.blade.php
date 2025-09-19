@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Cortina</h1>
    <form action="{{ route('cortinas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Aula</label>
            <input type="text" name="aula_id" class="form-control">
        </div>
        <div class="mb-3">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control">
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
