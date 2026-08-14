<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        // Traemos solo las tareas pendientes
        $tareas = Tarea::where('completada', false)->get();
        return view('tareas', compact('tareas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        Tarea::create([
            'descripcion' => $request->descripcion,
            'completada' => false
        ]);

        return back()->with('success', 'Tarea agregada correctamente');
    }
}