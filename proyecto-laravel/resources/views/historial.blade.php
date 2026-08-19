@extends('layouts.app')

@section('title', 'Historial de Tareas')

@section('content')
    <section id="historial-tareas" class="max-w-5xl mx-auto py-6">
        
        <!-- Encabezado con Botón de Regreso -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 border-b border-gray-200 pb-4 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">Historial de Tareas</h2>
                <p class="text-gray-500 mt-1">Aquí están todas las tareas que has completado con éxito.</p>
            </div>
            
            <a href="{{ route('tareas') }}" class="flex items-center gap-2 bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Volver a Pendientes
            </a>
        </div>
        
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-r-lg mb-6 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Lista de Tareas Completadas -->
        <ul id="lista-completadas" class="space-y-4 text-base">
            @forelse($tareas as $tarea)
                <li class="group flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50 p-4 rounded-xl border border-gray-200 border-l-4 border-l-emerald-500 opacity-90 hover:opacity-100 transition-opacity duration-200">
                    
                    <div class="flex flex-col w-full">
                        <!-- Texto tachado (line-through) -->
                        <span class="break-words text-gray-500 font-medium text-lg leading-tight line-through decoration-gray-400">
                            {{ $tarea->descripcion }}
                        </span>
                        
                        <div class="flex flex-wrap gap-2 mt-2 text-xs font-medium">
                            @if($tarea->categoria)
                                <span class="bg-gray-200 text-gray-600 px-2.5 py-1 rounded-md">
                                    {{ $tarea->categoria }}
                                </span>
                            @endif
                            
                            <span class="flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-100 text-emerald-700">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Completada el {{ \Carbon\Carbon::parse($tarea->updated_at)->format('d/m/Y') }}
                            </span>
                        </div>
                    </div>
                    
                   
                    <div class="flex items-center gap-2 shrink-0 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity duration-200 mt-3 sm:mt-0">
                        
                        
                        <form action="{{ route('tareas.reactivar', $tarea->id) }}" method="POST" class="m-0">
                            @csrf @method('PATCH')
                            <button type="submit" class="flex items-center gap-1 text-sm bg-white border border-gray-300 text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 py-1.5 px-3 rounded-lg transition-colors shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                                Reactivar
                            </button>
                        </form>

                        
                        <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="m-0">
                            @csrf @method('DELETE')
                            <button type="submit" class="flex items-center gap-1 text-sm bg-white border border-gray-300 text-red-600 hover:bg-red-50 hover:border-red-200 py-1.5 px-3 rounded-lg transition-colors shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <div class="text-center py-12 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    <svg class="mx-auto h-12 w-12 text-emerald-400 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aún no hay tareas completadas</h3>
                    <p class="mt-1 text-sm text-gray-500">Cuando termines tus pendientes, aparecerán aquí.</p>
                </div>
            @endforelse
        </ul>
    </section>
@endsection