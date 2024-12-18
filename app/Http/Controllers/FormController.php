<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    // Muestra el formulario
    public function showForm()
    {
        return view('form');
    }

    // Procesa el formulario
    public function submitForm(Request $request)
    {
        // Validación de los datos recibidos
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Procesar los datos (por ejemplo, guardarlos en la base de datos)
        // Si es necesario, puedes crear un modelo y guardar los datos

        return redirect()->back()->with('success', 'Formulario enviado con éxito');
    }
}
