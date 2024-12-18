<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesoSeco extends Model
{
    use HasFactory;

    // Nombre correcto de la tabla
    protected $table = 'pesos_secos'; 

    // Definir los campos que se pueden asignar de manera masiva
    protected $fillable = [
        'user_id', 
        'peso_inicial', // Campo para el peso inicial
        'peso_seco', // Campo para el peso seco
        'fecha_medicion', // Campo para la fecha de medición
        'notas', // Campo para las notas opcionales
        'tension_arterial', // Campo para la tensión arterial
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
