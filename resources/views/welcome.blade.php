@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; border-radius: 20px;">
        <h2 class="text-center mb-4">Aula Virtual</h2>

        <!-- Formulario de Login -->
        <form>
            <!-- Correo / Google -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="ejemplo@gmail.com" required>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="********" required>
            </div>

            <!-- Botón Iniciar Sesión -->
            <button type="submit" class="btn btn-primary w-100 mb-3">Iniciar Sesión</button>

            <!-- Iniciar con Google -->
            <button type="button" class="btn btn-outline-danger w-100 mb-3">
                <i class="bi bi-google"></i> Iniciar con Google
            </button>

            <!-- Links pequeños -->
            <div class="d-flex justify-content-between">
                <a href="#" class="text-muted small">Me olvidé mi contraseña</a>
                <a href="#" class="text-muted small">Crear cuenta</a>
            </div>
        </form>
    </div>
</div>
@endsection
