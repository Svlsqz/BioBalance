<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesosSecosTable extends Migration
{
    public function up()
    {
        Schema::create('pesos_secos', function (Blueprint $table) {
            $table->id(); // ID de la tabla
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el modelo User
            $table->decimal('peso_inicial', 8, 2); // Peso inicial
            $table->decimal('peso_seco', 8, 2); // Peso seco
            $table->dateTime('fecha_medicion'); // Fecha y hora de medición
            $table->text('notas')->nullable(); // Notas opcionales
            $table->string('tension_arterial')->nullable(); // Tensión arterial opcional
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    public function down()
    {
        Schema::dropIfExists('peso_secos');
    }
}
