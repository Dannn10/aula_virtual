@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">Nueva Reserva</div>
        <div class="card-body">
            <form action="{{ route('reservas.store') }}" method="POST">
                @csrf

                {{-- Docente: input con datalist para sugerencias --}}
                <div class="mb-3">
                    <label class="form-label">Docente</label>
                    <input list="docentesList" name="docente_name" value="{{ old('docente_name') }}" class="form-control" placeholder="Escribí el nombre del docente (ej: Dante Flores)" required>
                    <datalist id="docentesList">
                        @foreach($docentes as $d)
                            <option value="{{ $d->nombre }} {{ $d->apellido }}"></option>
                        @endforeach
                    </datalist>
                    @error('docente_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Aula --}}
                <div class="mb-3">
                    <label class="form-label">Aula</label>
                    <input list="aulasList" name="aula_name" value="{{ old('aula_name') }}" class="form-control" placeholder="Ej: Aula 12 / Sala A" required>
                    <datalist id="aulasList">
                        @foreach($aulas as $a)
                            <option value="{{ $a->nombre }}"></option>
                        @endforeach
                    </datalist>
                    @error('aula_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Materia --}}
                <div class="mb-3">
                    <label class="form-label">Materia</label>
                    <input list="materiasList" name="materia_name" value="{{ old('materia_name') }}" class="form-control" placeholder="Ej: Matemática" required>
                    <datalist id="materiasList">
                        @foreach($materias as $m)
                            <option value="{{ $m->nombre }}"></option>
                        @endforeach
                    </datalist>
                    @error('materia_name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- Fecha inicio / fin --}}
                <div class="mb-3">
                    <label class="form-label">Fecha y hora de inicio</label>
                    <input type="datetime-local" name="fecha_inicio" class="form-control" value="{{ old('fecha_inicio') }}" required>
                    @error('fecha_inicio') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha y hora de fin</label>
                    <input type="datetime-local" name="fecha_fin" class="form-control" value="{{ old('fecha_fin') }}" required>
                    @error('fecha_fin') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const inicio = document.querySelector('input[name="fecha_inicio"]');
    const fin = document.querySelector('input[name="fecha_fin"]');
    if(!inicio || !fin) return;
    if (inicio.value) fin.min = inicio.value;
    inicio.addEventListener('change', () => {
        fin.min = inicio.value;
        if (fin.value && fin.value <= inicio.value) fin.value = '';
    });
});
</script>
@endsection
