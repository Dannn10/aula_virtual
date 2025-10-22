@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100"
     style="background: linear-gradient(135deg, #7DD56F, #28A745);">

    <div class="card shadow-lg p-4" 
         style="max-width: 420px; width: 100%; border-radius: 25px; background-color: #ffffffee;">
        
        <h2 class="text-center fw-bold mb-3" style="color:#2f5132;">Crear cuenta</h2>
        <p class="text-center text-muted mb-4">Unite al sistema Aula Virtual</p>

        <!-- FORMULARIO REGISTER -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Nombre completo</label>
                <input type="text" name="name" class="form-control rounded-pill" placeholder="Juan Pérez" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Correo electrónico</label>
                <input type="email" name="email" class="form-control rounded-pill" placeholder="ejemplo@gmail.com" value="{{ old('email') }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Contraseña</label>
                <input type="password" name="password" class="form-control rounded-pill" placeholder="********" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Confirmar contraseña</label>
                <input type="password" name="password_confirmation" class="form-control rounded-pill" placeholder="********" required>
            </div>

            <button type="submit" class="btn btn-success w-100 rounded-pill mb-3 shadow-sm">
                Registrarme
            </button>

            <div class="text-center">
                <span class="text-muted small">¿Ya tenés cuenta?</span>
                <a href="{{ route('login') }}" class="text-primary small">Iniciar sesión</a>
            </div>
        </form>
    </div>
</div>
@endsection
