<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Campos permitidos para guardar masivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'profesion',
        'rol',
        'estado',
    ];

    // Campos que se ocultan al hacer consultas (como en APIs o JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Conversión de tipos
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
