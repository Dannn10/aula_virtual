@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="section-header bg-primary text-white rounded-top p-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="section-title mb-0">
                    Crear Aula
                </h1>
                <p class="section-subtitle mb-0 mt-2">Complete los datos básicos del aula</p>
            </div>
            <div class="col-md-4 text-end">
                <a href="{{ route('aulas.index') }}" class="btn btn-light">
                    Volver al Listado
                </a>
            </div>
        </div>
    </div>

    <div class="card shadow border-0">
        <div class="card-body p-4">
            <form action="{{ route('aulas.store') }}" method="POST">
                @csrf

                <div class="row g-3">

                    <!-- Nombre -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Nombre del Aula *</label>
                        <input type="text" name="nombre"
                               class="form-control @error('nombre') is-invalid @enderror"
                               value="{{ old('nombre') }}" required
                               placeholder="Ej: Aula 101">
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Capacidad -->
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Capacidad *</label>
                        <input type="number" name="capacidad"
                               class="form-control @error('capacidad') is-invalid @enderror"
                               value="{{ old('capacidad') }}" required min="1" max="500"
                               placeholder="Ej: 30">
                        @error('capacidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">
                            Guardar Aula
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
