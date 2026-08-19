<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TareaController extends Controller
{
    public function index(Request $request) 
    {
       
        $query = Tarea::where('completada', false)
                      ->where('id_user', Auth::id());

        
        $query->when($request->categoria, function ($q, $categoria) {
            return $q->where('categoria', $categoria);
        });

        
        $query->when($request->prioridad, function ($q, $prioridad) {
            return $q->where('prioridad', $prioridad);
        });

        
        $query->when($request->vencimiento, function ($q, $vencimiento) {
            if ($vencimiento === 'hoy') {
                return $q->whereDate('fecha_vencimiento', Carbon::today());
            } elseif ($vencimiento === 'proximas') {
                // Tareas que vencen en los próximos 7 días
                return $q->whereBetween('fecha_vencimiento', [Carbon::today(), Carbon::today()->addDays(7)]);
            } elseif ($vencimiento === 'vencidas') {
                return $q->whereNotNull('fecha_vencimiento')
                         ->whereDate('fecha_vencimiento', '<', Carbon::today());
            }
        });

        
        $tareas = $query->orderByRaw('ISNULL(fecha_vencimiento), fecha_vencimiento ASC')->get();

        return view('tareas', compact('tareas'));
    }

    public function inicio()
    {
        $pendientes = \App\Models\Tarea::where('completada', false)->where('id_user', Auth::id())->count();
        
        // Tareas completadas específicamente en el día de hoy
        $completadasHoy = \App\Models\Tarea::where('completada', true)
                            ->where('id_user', Auth::id())
                            ->whereDate('updated_at', \Carbon\Carbon::today())
                            ->count();

        $tareasUrgentes = \App\Models\Tarea::where('completada', false)
        ->where('id_user', \Illuminate\Support\Facades\Auth::id())
        ->whereNotNull('fecha_vencimiento')
        ->whereDate('fecha_vencimiento', '<=', \Carbon\Carbon::today())
        ->orderBy('fecha_vencimiento', 'asc')
        ->take(4) 
        ->get();

        return view('inicio', compact('pendientes', 'completadasHoy', 'tareasUrgentes'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'fecha_vencimiento' => 'nullable|date',
            'prioridad' => 'nullable|in:Baja,Media,Alta',
            'categoria' => 'nullable|in:Trabajo,Casa,Formacion',
        ]);

    
        Tarea::create([
            'id_user' => Auth::id(),
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'prioridad' => $request->prioridad ?? 'baja',
            'categoria' => $request->categoria,
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

  
    public function destroy(Tarea $tarea)
    {
        if ($tarea->id_user !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta tarea.');
        }

        $tarea->delete();

        return back()->with('success', 'Tarea eliminada correctamente');
    }

    public function historial()
    {
        $tareas = Tarea::where('completada', true)
                    ->where('id_user', Auth::id())
                    ->orderBy('updated_at', 'desc') 
                    ->get();
                    
        return view('historial', compact('tareas')); 
        
    }

    public function reactivar(Tarea $tarea)
    {
        if ($tarea->id_user !== Auth::id()) {
            abort(403, 'No tienes permiso para modificar esta tarea.');
        }

        $tarea->update([
            'completada' => false
        ]);

        return back()->with('success', 'Tarea reactivada y enviada a pendientes.');
    }
}