<?php

namespace App\Http\Controllers;

use App\Models\PesoSeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesoSecoController extends Controller
{
    // Mostrar todos los registros de peso del usuario
    public function index()
    {
        // Obtenemos los registros de peso seco del usuario autenticado
        $pesos = PesoSeco::where('user_id', Auth::id())->get();
        return view('index', compact('pesos'));
    }

    // Mostrar el formulario para registrar un nuevo peso
    // public function create()
    // {
    //     // Mostramos el formulario de registro
    //     return view('pesos.create');
    // }

    // Guardar un nuevo registro de peso
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'peso_inicial' => 'required|numeric', // Validación de peso inicial
            'peso_seco' => 'required|numeric', // Validación de peso seco
            'fecha_medicion' => 'required|date', // Validación de fecha de medición
            'notas' => 'nullable|string', // Notas opcionales
            'tension_arterial' => 'nullable|string', // Tensión arterial opcional
        ]);

        // Crear un nuevo registro de peso seco
        PesoSeco::create([
            'user_id' => Auth::id(), // Relacionamos el registro con el usuario autenticado
            'peso_inicial' => $request->peso_inicial, // Almacenamos el peso inicial
            'peso_seco' => $request->peso_seco, // Almacenamos el peso seco
            'fecha_medicion' => $request->fecha_medicion, // Almacenamos la fecha de medición
            'notas' => $request->notas, // Almacenamos las notas (opcionales)
            'tension_arterial' => $request->tension_arterial, // Almacenamos la tensión arterial (opcional)
        ]);

        // Redirigimos a la vista de índice con un mensaje de éxito
        return redirect()->route('form')->with('success', 'Peso registrado exitosamente.');
    }

   

    // Mostrar los detalles de un peso registrado
    public function show(PesoSeco $peso)
    {
        return view('pesos.show', compact('peso'));
    }

    // Mostrar el formulario para editar un registro de peso
    public function edit(PesoSeco $peso)
    {
        return view('pesos.edit', compact('peso'));
    }

    // Actualizar un registro de peso
    public function update(Request $request, PesoSeco $peso)
    {
        // Validación de los datos para la actualización
        $request->validate([
            'peso_inicial' => 'required|numeric', // Validación de peso inicial
            'peso_seco' => 'required|numeric', // Validación de peso seco
            'fecha_medicion' => 'required|date', // Validación de fecha de medición
            'notas' => 'nullable|string', // Notas opcionales
            'tension_arterial' => 'nullable|string', // Tensión arterial opcional
        ]);

        // Actualizar el registro de peso con los nuevos datos
        $peso->update($request->all());

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Peso actualizado exitosamente');
    }

    // Eliminar un registro de peso
    public function destroy(PesoSeco $peso)
    {
        // Eliminar el registro de peso
        $peso->delete();

        // Redirigir a la vista de índice con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Peso eliminado exitosamente');
    }
}
