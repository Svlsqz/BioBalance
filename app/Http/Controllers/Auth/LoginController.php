<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('login');
    }

    // Iniciar sesión del usuario
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Si la autenticación es exitosa, redirige al usuario a su destino deseado
            return redirect()->intended('/home');  // Puedes cambiar '/home' a la ruta que desees
        }

        // Si la autenticación falla, vuelve a mostrar el formulario con un error
        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.']);
    }
}
