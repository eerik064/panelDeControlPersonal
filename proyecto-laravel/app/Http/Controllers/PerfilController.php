<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        // [PROVISIONAL]
        
        if (!$usuario) {
            $usuario = User::first() ?? new User([
                'name' => 'Erik Edil Espindola Jimenez',
                'email' => 'erik@example.com',
                'profesion' => 'Técnico Superior en Sistemas Informáticos',
                'rol' => 'Administrador',
                'estado' => 'Activo'
            ]);
        }

        return view('perfil', compact('usuario'));
    }
}