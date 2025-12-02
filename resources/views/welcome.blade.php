@extends('layouts.app')

@section('content')
<style>
    .login-container {
        min-height: 80vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 0;
    }
    
    .login-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 420px;
        width: 100%;
        margin: 1rem;
    }
    
    .login-header {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        color: white;
        padding: 2.5rem 2rem;
        text-align: center;
    }
    
    .login-title {
        font-weight: 700;
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    
    .login-subtitle {
        opacity: 0.9;
        font-weight: 300;
    }
    
    .login-body {
        padding: 2.5rem 2rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    
    .form-control {
        border-radius: 12px;
        border: 2px solid #e9ecef;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
    }
    
    .btn-login {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        border: none;
        border-radius: 12px;
        padding: 0.75rem;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
    }
    
    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }
    
    .btn-google {
        border: 2px solid #db4437;
        border-radius: 12px;
        padding: 0.75rem;
        color: #db4437;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        width: 100%;
        background: white;
    }
    
    .btn-google:hover {
        background: #db4437;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(219, 68, 55, 0.3);
    }
    
    .login-links {
        display: flex;
        justify-content: space-between;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e9ecef;
    }
    
    .login-links a {
        color: #6c757d;
        text-decoration: none;
        font-size: 0.9rem;
        transition: color 0.3s ease;
    }
    
    .login-links a:hover {
        color: #4361ee;
        text-decoration: underline;
    }
    
    .input-group {
        position: relative;
    }
    
    .input-icon {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    
    .password-toggle {
        background: none;
        border: none;
        color: #6c757d;
        cursor: pointer;
    }
    
    .divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 1.5rem 0;
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e9ecef;
    }
    
    .divider::before {
        margin-right: 1rem;
    }
    
    .divider::after {
        margin-left: 1rem;
    }
</style>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h1 class="login-title"><i class="fas fa-graduation-cap me-2"></i>Aula Virtual</h1>
            <p class="login-subtitle">Ingresá a tu cuenta para continuar</p>
        </div>
        
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Correo electrónico -->
                <div class="mb-4">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" 
                               placeholder="ejemplo@gmail.com" required
                               value="{{ old('email') }}">
                        <span class="input-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-4">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" 
                               placeholder="********" required>
                        <span class="input-icon">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye"></i>
                            </button>
                        </span>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Recordar sesión -->
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Recordar sesión</label>
                </div>

                <!-- Botón Iniciar Sesión -->
                <button type="submit" class="btn btn-login mb-4">
                    <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                </button>

                <!-- Divider -->
                <div class="divider">o continuar con</div>

                <!-- Iniciar con Google -->
                <button type="button" class="btn btn-google mb-4">
                    <i class="fab fa-google me-2"></i> Iniciar con Google
                </button>

                <!-- Links de ayuda -->
                <div class="login-links">
                    <a href="{{ route('password.request') }}">
                        <i class="fas fa-key me-1"></i>Olvidé mi contraseña
                    </a>
                    <a href="{{ route('register') }}">
                        <i class="fas fa-user-plus me-1"></i>Crear cuenta
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.password-toggle i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    }
    
    // Efecto de carga suave
    document.addEventListener('DOMContentLoaded', function() {
        const loginCard = document.querySelector('.login-card');
        loginCard.style.opacity = '0';
        loginCard.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            loginCard.style.transition = 'all 0.5s ease';
            loginCard.style.opacity = '1';
            loginCard.style.transform = 'translateY(0)';
        }, 100);
    });
</script>
@endsection