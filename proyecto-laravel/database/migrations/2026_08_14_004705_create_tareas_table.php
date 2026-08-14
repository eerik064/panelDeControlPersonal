<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion'); // Ej: "Aprender HTML semántico"
            $table->boolean('completada')->default(false); // Para saber si está lista o pendiente
            $table->timestamps(); // Crea created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};