<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesoSeco;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard del paciente con sus datos.
     */
    public function showChart()
{
    // Obtener los registros de peso seco para el usuario autenticado
    $user = Auth::user();
    $registrosPesoSeco = PesoSeco::where('user_id', $user->id)->orderBy('fecha_medicion', 'asc')->get();

    // Datos de ejemplo si no hay registros
    if ($registrosPesoSeco->isEmpty()) {
        $registrosPesoSeco = collect([
            (object)[ 'fecha_medicion' => '2024-01-01', 'peso_inicial' => 70, 'peso_seco' => 68 ],
            (object)[ 'fecha_medicion' => '2024-01-15', 'peso_inicial' => 68, 'peso_seco' => 66 ],
            (object)[ 'fecha_medicion' => '2024-02-01', 'peso_inicial' => 66, 'peso_seco' => 64 ],
            (object)[ 'fecha_medicion' => '2024-02-15', 'peso_inicial' => 64, 'peso_seco' => 63 ]
        ]);
    }

    // Preparar los datos para el gráfico
    $labels = $registrosPesoSeco->pluck('fecha_medicion')->map(function ($fecha) {
        return Carbon::parse($fecha)->format('d/m/Y'); // Convertir a Carbon y formatear
    });

    $pesoInicial = $registrosPesoSeco->pluck('peso_inicial')->map(function ($peso) {
        return (float) $peso; // Asegura que sean números flotantes
    })->toArray();

    $pesoFinal = $registrosPesoSeco->pluck('peso_seco')->map(function ($peso) {
        return (float) $peso; // Asegura que sean números flotantes
    })->toArray();

    // Pasar los datos a la vista
    return view('index')
        ->with('registrosPesoSeco', $registrosPesoSeco)
        ->with('labels', $labels)
        ->with('pesoInicial', $pesoInicial)
        ->with('pesoFinal', $pesoFinal);
}

}
