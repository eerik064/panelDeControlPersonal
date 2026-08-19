<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('listaLibros', compact('libros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'precio' => 'required|integer',
        ], [
            'titulo.required' => 'Falta el titulo del libro.',
            'precio.required' => 'Falta el precio del libro.',
            'precio.integer'  => 'Ese precio no es un numero entero.',
        ]);

        Libro::create([
            'titulo' => $request->titulo,
            'precio' => $request->precio,
        ]);

        return redirect()->route('libros');
    }
}