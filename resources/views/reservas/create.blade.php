@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Reserva</h1>

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control" required>
                <option value="">Seleccione...</option>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Aula</label>
            <input type="text" name="aula" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha</label>
            <input type="datetime-local" name="fecha" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
