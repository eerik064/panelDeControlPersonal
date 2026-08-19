@extends('layouts.app')

@section('title', 'Mis Tareas')

@section('content')
    <section id="tareas" class="max-w-5xl mx-auto py-6">
        
        <!-- Encabezado con Botón de Historial -->
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 border-b border-gray-200 pb-4 gap-4">
            <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">Mis Tareas</h2>
            
            <!-- NUEVO: Botón para ver el historial -->
            <a href="{{ route('tareas.historial') }}" class="flex items-center gap-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold py-2 px-4 rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Ver Historial Completadas
            </a>
        </div>
        
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded-r-lg mb-6 shadow-sm flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario Estilizado -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Añadir nueva tarea</h3>
            <form action="{{ route('tareas.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                    
                    <div class="md:col-span-12">
                        <input type="text" name="descripcion" required placeholder="¿Qué necesitas hacer hoy?" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 focus:bg-white outline-none transition-all duration-200" value="{{ old('descripcion') }}">
                        @error('descripcion') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-4">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Categoría</label>
                        <select name="categoria" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all duration-200 text-gray-700">
                            <option value="" disabled {{ old('categoria') ? '' : 'selected' }}>Selecciona...</option>
                            <option value="Trabajo" {{ old('categoria') == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                            <option value="Casa" {{ old('categoria') == 'Casa' ? 'selected' : '' }}>Casa</option>
                            <option value="Formacion" {{ old('categoria') == 'Formacion' ? 'selected' : '' }}>Formación</option>
                        </select>
                        @error('categoria') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all duration-200 text-gray-700" value="{{ old('fecha_vencimiento') }}">
                        @error('fecha_vencimiento') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-3">
                        <label class="block text-xs font-semibold text-gray-500 mb-1 ml-1">Prioridad</label>
                        <select name="prioridad" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition-all duration-200 text-gray-700">
                            <option value="Baja" {{ old('prioridad') == 'Baja' ? 'selected' : '' }}>🟢 Baja</option>
                            <option value="Media" {{ old('prioridad') == 'Media' ? 'selected' : '' }}>🟡 Media</option>
                            <option value="Alta" {{ old('prioridad') == 'Alta' ? 'selected' : '' }}>🔴 Alta</option>
                        </select>
                        @error('prioridad') <span class="text-red-500 text-xs mt-1 ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <button type="submit" id="btn-agregar" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-4 rounded-xl shadow-md hover:shadow-lg transform transition-all duration-200 hover:-translate-y-0.5 whitespace-nowrap h-[46px] flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Agregar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Filtros Estilizados -->
        <div class="mb-8">
            <form action="{{ route('tareas') }}" method="GET" class="flex flex-col sm:flex-row gap-3 items-center bg-gray-50 p-3 rounded-xl border border-gray-200">
                <div class="w-full sm:w-auto flex-grow flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-400 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                    <span class="text-sm font-medium text-gray-600 mr-2 hidden sm:block">Filtros:</span>
                </div>

                <select name="categoria" class="w-full sm:w-40 px-3 py-2 text-sm border-0 bg-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 text-gray-700">
                    <option value="">Todas las áreas</option>
                    <option value="Trabajo" {{ request('categoria') == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                    <option value="Casa" {{ request('categoria') == 'Casa' ? 'selected' : '' }}>Casa</option>
                    <option value="Formacion" {{ request('categoria') == 'Formacion' ? 'selected' : '' }}>Formación</option>
                </select>

                <select name="prioridad" class="w-full sm:w-40 px-3 py-2 text-sm border-0 bg-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 text-gray-700">
                    <option value="">Cualquier prioridad</option>
                    <option value="alta" {{ request('prioridad') == 'alta' ? 'selected' : '' }}>Alta</option>
                    <option value="media" {{ request('prioridad') == 'media' ? 'selected' : '' }}>Media</option>
                    <option value="baja" {{ request('prioridad') == 'baja' ? 'selected' : '' }}>Baja</option>
                </select>

                <select name="vencimiento" class="w-full sm:w-40 px-3 py-2 text-sm border-0 bg-white rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 text-gray-700">
                    <option value="">Cualquier fecha</option>
                    <option value="hoy" {{ request('vencimiento') == 'hoy' ? 'selected' : '' }}>Vence hoy</option>
                    <option value="proximas" {{ request('vencimiento') == 'proximas' ? 'selected' : '' }}>Próximos 7 días</option>
                    <option value="vencidas" {{ request('vencimiento') == 'vencidas' ? 'selected' : '' }}>Vencidas</option>
                </select>

                <div class="w-full sm:w-auto flex gap-2">
                    <button type="submit" class="w-full sm:w-auto bg-gray-800 hover:bg-gray-900 text-white text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors">
                        Aplicar
                    </button>
                    @if(request()->hasAny(['categoria', 'prioridad', 'vencimiento']))
                        <a href="{{ route('tareas') }}" class="w-full sm:w-auto text-center bg-white hover:bg-gray-100 text-gray-700 text-sm font-medium py-2 px-4 rounded-lg shadow-sm transition-colors">
                            Limpiar
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Lista de Tareas -->
        <ul id="lista-tareas" class="space-y-4 text-base">
            @forelse($tareas as $tarea)
                @php
                    $bordePrioridad = match($tarea->prioridad) {
                        'Alta', 'alta' => 'border-l-4 border-l-red-500',
                        'Media', 'media' => 'border-l-4 border-l-yellow-400',
                        default => 'border-l-4 border-l-gray-300',
                    };
                @endphp
                
                <li class="group flex items-center justify-between gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100 {{ $bordePrioridad }} hover:shadow-md transform transition-all duration-200 hover:-translate-y-1">
                    
                    <div class="flex items-start gap-4 w-full">
                        <form action="{{ route('tareas.completar', $tarea->id) }}" method="POST" class="m-0 mt-0.5">
                            @csrf @method('PATCH')
                            <div class="relative flex items-center">
                                <input type="checkbox" onchange="this.form.submit()" class="w-6 h-6 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2 cursor-pointer transition-colors">
                            </div>
                        </form>
                        
                        <div class="flex flex-col">
                            <span class="break-words text-gray-800 font-medium text-lg leading-tight">{{ $tarea->descripcion }}</span>
                            
                            <div class="flex flex-wrap gap-2 mt-2 text-xs font-medium">
                                @if($tarea->categoria)
                                    <span class="bg-indigo-50 text-indigo-600 px-2.5 py-1 rounded-md">
                                        {{ $tarea->categoria }}
                                    </span>
                                @endif
                                
                                @if($tarea->fecha_vencimiento)
                                    @php
                                        $esPasado = \Carbon\Carbon::parse($tarea->fecha_vencimiento)->isPast();
                                        $esHoy = \Carbon\Carbon::parse($tarea->fecha_vencimiento)->isToday();
                                    @endphp
                                    <span class="flex items-center gap-1.5 px-2.5 py-1 rounded-md {{ $esPasado && !$esHoy ? 'bg-red-50 text-red-600' : ($esHoy ? 'bg-yellow-50 text-yellow-700' : 'bg-gray-100 text-gray-600') }}">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        {{ $esHoy ? 'Vence hoy' : \Carbon\Carbon::parse($tarea->fecha_vencimiento)->format('d/m/Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST" class="ml-2 flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-gray-400 hover:text-red-500 bg-white hover:bg-red-50 p-2 rounded-lg transition-colors" title="Eliminar tarea">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </li>
            @empty
                <div class="text-center py-12 bg-white rounded-2xl border border-dashed border-gray-300">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No hay tareas pendientes</h3>
                    <p class="mt-1 text-sm text-gray-500">¡Excelente trabajo! Tienes todo al día.</p>
                </div>
            @endforelse
        </ul>
    </section>
@endsection