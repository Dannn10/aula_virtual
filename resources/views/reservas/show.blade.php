@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📄 Detalles de la Reserva #{{ $reserva->id }}</h4>
            <a href="{{ route('reservas.index') }}" class="btn btn-light btn-sm">⬅️ Volver</a>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="fw-bold">👨‍🏫 Docente:</label>
                <p class="form-control bg-light">{{ $reserva->docente->nombre ?? '-' }} {{ $reserva->docente->apellido ?? '' }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">🏫 Aula:</label>
                <p class="form-control bg-light">{{ $reserva->aula->nombre ?? 'Sin aula' }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">📘 Materia:</label>
                <p class="form-control bg-light">{{ $reserva->materia->nombre ?? 'Sin materia' }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">🕒 Fecha de inicio:</label>
                <p class="form-control bg-light">{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y H:i') }}</p>
            </div>

            <div class="mb-3">
                <label class="fw-bold">🕔 Fecha de fin:</label>
                <p class="form-control bg-light">{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
