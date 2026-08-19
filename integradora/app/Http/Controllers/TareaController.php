<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareaController extends Controller
{
    public function index()
    {
        // Traemos solo las tareas pendientes
        $tareas = Tarea::where('completada', false)
               ->where('id_user', Auth::id())
               ->get();
        return view('tareas', compact('tareas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        Tarea::create([
            'id_user' => Auth::user()->id,
            'descripcion' => $request->descripcion,
            'completada' => false
        ]);

        return back()->with('success', 'Tarea agregada correctamente');
    }

    public function completar(Tarea $tarea)
    {
       
        if ($tarea->id_user !== Auth::id()) {
            abort(403, 'No tienes permiso para modificar esta tarea.');
        }

      
        $tarea->update([
            'completada' => true
        ]);

        return back()->with('success', '¡Tarea completada!');
    }
}