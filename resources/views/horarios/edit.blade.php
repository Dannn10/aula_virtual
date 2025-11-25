@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Horario</h1>

    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="materia_id" class="form-label">Materia</label>
            <select name="materia_id" id="materia_id" class="form-control" required>
                <option value="">-- Seleccione una materia --</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" 
                        {{ $horario->materia_id == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <input type="text" name="dia" id="dia" class="form-control" value="{{ $horario->dia }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ $horario->hora_inicio }}" required>
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ $horario->hora_fin }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
 