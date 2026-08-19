<?php


namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string'
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa una dirección de correo electrónico válida.',
            'mensaje.required' => 'El campo mensaje no puede estar vacío.'
        ]);

        Contacto::create($request->all());

        return back()->with('success', 'Mensaje enviado correctamente');
    }
}