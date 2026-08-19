@extends('layouts.app')

@section('title', 'Inicio - Panel')

@section('content')
    <div class="max-w-6xl mx-auto py-6">
        
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b border-gray-200 pb-6 gap-4">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 tracking-tight">¡Hola, {{Auth::user()->name}} 👋</h2>
                <p class="text-gray-500 mt-2">Aquí tienes un resumen de tu actividad para hoy.</p>
            </div>
            <div class="text-right text-gray-500 bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
                <p class="text-sm font-medium uppercase tracking-wider text-indigo-600">Cochabamba, Bolivia</p>
                <p class="text-sm">{{ \Carbon\Carbon::now()->translatedFormat('l, d \d\e F') }}</p>
            </div>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            
           
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute right-0 top-0 mt-4 mr-4 bg-indigo-50 text-indigo-500 p-2 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Tareas Pendientes</h3>
                
                <p class="text-4xl font-extrabold text-gray-800">5</p> 
                <p class="text-xs text-gray-400 mt-2">2 con prioridad alta</p>
            </div>

            
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow relative overflow-hidden">
                <div class="absolute right-0 top-0 mt-4 mr-4 bg-emerald-50 text-emerald-500 p-2 rounded-xl">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider mb-1">Completadas Hoy</h3>
                
                <p class="text-4xl font-extrabold text-gray-800">3</p>
                <p class="text-xs text-emerald-600 mt-2 font-medium flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                    ¡Buen ritmo!
                </p>
            </div>

            
            <div class="bg-gradient-to-br from-indigo-600 to-purple-700 p-6 rounded-2xl shadow-md text-white hover:shadow-lg transition-shadow relative overflow-hidden flex flex-col justify-between">
                <div>
                    <h3 class="text-indigo-100 text-sm font-semibold uppercase tracking-wider mb-1">Siguiente Acción</h3>
                    <p class="text-lg font-bold leading-tight mt-1">Revisar panel de tareas urgentes</p>
                </div>
                <a href="{{ route('tareas') }}" class="mt-4 bg-white/20 hover:bg-white/30 text-white text-sm font-semibold py-2 px-4 rounded-xl backdrop-blur-sm transition-colors inline-flex items-center gap-2 self-start">
                    Ir a Mis Tareas
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
           
            <div class="lg:col-span-2">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Accesos Rápidos
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    
                    <a href="{{ route('tareas') }}" class="flex flex-col items-center justify-center bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-indigo-200 hover:-translate-y-1 transition-all duration-200 group">
                        <div class="bg-indigo-50 p-3 rounded-full group-hover:bg-indigo-100 transition-colors mb-3">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Mis Tareas</span>
                    </a>

                    <a href="{{ route('tareas.historial') }}" class="flex flex-col items-center justify-center bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md hover:border-emerald-200 hover:-translate-y-1 transition-all duration-200 group">
                        <div class="bg-emerald-50 p-3 rounded-full group-hover:bg-emerald-100 transition-colors mb-3">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-sm font-semibold text-gray-700">Historial</span>
                    </a>

                   
                    <a href="#" class="flex flex-col items-center justify-center bg-gray-50 p-6 rounded-2xl border border-dashed border-gray-300 hover:bg-gray-100 transition-all duration-200 cursor-pointer">
                        <div class="bg-gray-200 p-3 rounded-full mb-3 text-gray-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </div>
                        <span class="text-sm font-medium text-gray-500">Nuevo Módulo</span>
                    </a>

                </div>
            </div>

           
            <div>
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Próximas a vencer
                </h3>
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <ul class="divide-y divide-gray-100">
                        @forelse($tareasUrgentes as $tarea)
                            @php
                                // Comprobamos si la fecha ya pasó (es decir, fue ayer o antes) o si es estrictamente hoy
                                $esPasado = \Carbon\Carbon::parse($tarea->fecha_vencimiento)->isPast() && !\Carbon\Carbon::parse($tarea->fecha_vencimiento)->isToday();
                            @endphp
                            
                            <li class="p-4 hover:bg-gray-50 transition-colors flex justify-between items-center gap-2">
                                <div class="truncate">
                                    <p class="text-sm font-semibold text-gray-800 truncate" title="{{ $tarea->descripcion }}">
                                        {{ $tarea->descripcion }}
                                    </p>
                                    <p class="text-xs mt-1 {{ $esPasado ? 'text-red-600 font-bold' : 'text-red-500 font-medium' }}">
                                        {{ $esPasado ? 'Vencida' : 'Vence hoy' }}
                                    </p>
                                </div>
                            </li>
                        @empty
                            <li class="p-6 text-center">
                                <p class="text-sm text-gray-500">No hay tareas que venzan hoy.</p>
                                <span class="text-xs text-gray-400">¡Todo bajo control!</span>
                            </li>
                        @endforelse
                    </ul>
                    <div class="p-3 bg-gray-50 text-center border-t border-gray-100">
                       >
                        <a href="{{ route('tareas', ['vencimiento' => 'hoy']) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 transition-colors">
                            Ver todas en detalle &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection