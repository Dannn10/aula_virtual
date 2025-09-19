@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Disponibilidad</h1>

    <form action="{{ route('disponibilidades.update', $disponibilidad) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control" required>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ $disponibilidad->docente_id == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }} {{ $docente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Día</label>
            <input type="text" name="dia" value="{{ $disponibilidad->dia }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Hora Inicio</label>
            <input type="time" name="hora_inicio" value="{{ $disponibilidad->hora_inicio }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Hora Fin</label>
            <input type="time" name="hora_fin" value="{{ $disponibilidad->hora_fin }}" class="form-control" required>
        </div>

        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('disponibilidades.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
