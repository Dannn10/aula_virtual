<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar formulario de registro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Registrar usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // inicia sesión automáticamente
        // <-- CAMBIO AQUÍ: Apuntamos a 'dashboard' en lugar de 'home'
        return redirect()->route('dashboard')->with('success', '¡Registro exitoso!');
    }

    // Mostrar formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Iniciar sesión
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // <-- Y CAMBIO AQUÍ: Apuntamos a 'dashboard' en lugar de 'home'
            return redirect()->route('dashboard')->with('success', 'Sesión iniciada correctamente');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Cerraste sesión correctamente.');
    }
}
