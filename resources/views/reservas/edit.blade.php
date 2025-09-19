@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>

    <form action="{{ route('reservas.update', $reserva) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Docente</label>
            <select name="docente_id" class="form-control" required>
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}" {{ $reserva->docente_id == $docente->id ? 'selected' : '' }}>
                        {{ $docente->nombre }} {{ $docente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Aula</label>
            <input type="text" name="aula" value="{{ $reserva->aula }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Fecha</label>
            <input type="datetime-local" name="fecha" value="{{ \Carbon\Carbon::parse($reserva->fecha)->format('Y-m-d\TH:i') }}" class="form-control" required>
        </div>

        <button class="btn btn-warning">Actualizar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
