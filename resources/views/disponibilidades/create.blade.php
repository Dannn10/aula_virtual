@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nueva Disponibilidad</h1>

    <form action="{{ route('disponibilidades.store') }}" method="POST">
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
            <label>Día</label>
            <input type="text" name="dia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Hora Inicio</label>
            <input type="time" name="hora_inicio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Hora Fin</label>
            <input type="time" name="hora_fin" class="form-control" required>
        </div>

        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
