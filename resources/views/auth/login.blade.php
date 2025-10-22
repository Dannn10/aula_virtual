@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" 
     style="background: linear-gradient(135deg, #74ABE2, #5563DE);">

    <div class="card shadow-lg p-4 text-center" 
         style="max-width: 380px; width: 100%; border-radius: 20px; background: #fff;">
        
        <h2 class="fw-bold mb-3" style="color:#333;">Iniciar sesión</h2>
        <p class="text-muted mb-4">Accedé a tu Aula Virtual</p>

        <!-- FORMULARIO LOGIN -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3 text-start">
                <label for="email" class="form-label fw-semibold">Correo electrónico</label>
                <input type="email" name="email" class="form-control rounded-pill" id="email"
                       placeholder="ejemplo@gmail.com" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label fw-semibold">Contraseña</label>
                <input type="password" name="password" class="form-control rounded-pill" id="password" placeholder="********" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill mb-3" 
                    style="background-color:#5563DE; border:none;">Ingresar</button>

            <div class="d-flex justify-content-between">
                <!-- ✅ Enlace funcional para recuperar contraseña -->
                <a href="{{ route('password.request') }}" class="text-muted small">Me olvidé mi contraseña</a>
                <a href="{{ route('register') }}" class="text-primary small">Crear cuenta</a>
            </div>
        </form>
    </div>
</div>
@endsection
