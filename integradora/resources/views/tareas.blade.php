@extends('layouts.app')

@section('title', 'Mis Tareas')

@section('content')
    <section id="tareas">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Tareas pendientes</h2>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tareas.store') }}" method="POST" class="mb-8 flex flex-col sm:flex-row gap-3">
            @csrf
            <input type="text" name="descripcion" required placeholder="Nueva tarea..." class="w-full sm:flex-grow px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            
            <button type="submit" id="btn-agregar" class="w-full sm:w-auto bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 sm:py-2 px-4 rounded-md shadow-sm transition whitespace-nowrap">
                + Agregar tarea
            </button>
        </form>

        <ul id="lista-tareas" class="mb-6 space-y-3 text-base sm:text-lg">
            @forelse($tareas as $tarea)
                <li class="flex items-start gap-3 bg-gray-50 p-3 rounded-md border border-gray-200 hover:bg-gray-100 transition">
                    
                    <form action="{{ route('tareas.completar', $tarea->id) }}" method="POST" class="m-0 mt-1 flex items-center">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" 
                               onchange="this.form.submit()" 
                               class="w-5 h-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500 cursor-pointer shadow-sm">
                    </form>
                    
                    <span class="break-words text-gray-700">{{ $tarea->descripcion }}</span>
                </li>
            @empty
                <li class="text-gray-400 italic list-none text-center py-4">No hay tareas pendientes. ¡Todo al día!</li>
            @endforelse
        </ul>
    </section>
@endsection