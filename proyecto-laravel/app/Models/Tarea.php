<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    // Campos permitidos para guardar masivamente
    protected $fillable = [
        'id_user',
        'descripcion',
        'completada',
    ];

    // Convertir el valor a un tipo específico automáticamente
    protected function casts(): array
    {
        return [
            'completada' => 'boolean',
        ];
    }
}
