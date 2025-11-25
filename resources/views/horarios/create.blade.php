@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Horario</h1>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="materia_id" class="form-label">Materia</label>
            <select name="materia_id" id="materia_id" class="form-control" required>
                <option value="">Seleccione una materia...</option>
                @foreach($materias as $materia)
                    <option value="{{ $materia->id }}" {{ old('materia_id') == $materia->id ? 'selected' : '' }}>
                        {{ $materia->nombre }}
                    </option>
                @endforeach
            </select>
            @error('materia_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="dia" class="form-label">Día</label>
            <input type="text" name="dia" id="dia" class="form-control" value="{{ old('dia') }}" placeholder="Ej: Lunes" required>
            @error('dia') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="hora_inicio" class="form-label">Hora de inicio</label>
            <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" value="{{ old('hora_inicio') }}" required>
            @error('hora_inicio') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="hora_fin" class="form-label">Hora de fin</label>
            <input type="time" name="hora_fin" id="hora_fin" class="form-control" value="{{ old('hora_fin') }}" required>
            @error('hora_fin') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex gap-2">
            <button class="btn btn-success">Guardar</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection
