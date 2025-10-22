@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" 
     style="background: linear-gradient(135deg, #74ABE2, #5563DE);">

    <div class="card shadow-lg p-4 text-center" style="max-width: 380px; border-radius: 20px;">
        <h4 class="fw-bold mb-3">Recuperar contraseña</h4>
        <p class="text-muted">Te enviaremos un enlace para restablecer tu contraseña.</p>

        @if (session('status'))
            <div class="alert alert-success small">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" class="form-control rounded-pill mb-3" placeholder="tu correo..." required>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Enviar enlace</button>
        </form>
    </div>
</div>
@endsection
