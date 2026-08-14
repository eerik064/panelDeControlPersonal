<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ej: "Erik Edil Espindola Jimenez"
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
            // Campos extra para tu vista de Perfil
            $table->string('profesion')->nullable(); // Ej: "Técnico Superior en Sistemas Informáticos"
            $table->string('rol')->default('Usuario'); // Ej: "Administrador"
            $table->string('estado')->default('Activo'); // Ej: "Activo" o "Inactivo"
            
            $table->rememberToken();
            $table->timestamps();
        });

        // (Las tablas de password_reset_tokens y sessions que vienen por defecto déjalas igual)
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
