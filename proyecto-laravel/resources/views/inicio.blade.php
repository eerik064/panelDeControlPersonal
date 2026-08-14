@extends('layouts.app')

@section('title', 'Inicio - Panel')

@section('content')
    <div class="text-center py-6 border-b border-gray-100 mb-6">
        <h2 class="text-3xl font-extrabold text-indigo-600">Inicio</h2>
        <p class="text-gray-500 mt-2">Resumen general de tu panel de control.</p>
    </div>

    <section id="widgets" class="bg-blue-50 p-6 rounded-lg border border-blue-100">
        <h3 class="text-lg font-bold text-blue-800 mb-2">Información Extra</h3>
        <article id="clima-widget" class="flex items-center space-x-2 text-blue-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
            <p>Cargando información del clima en Cochabamba...</p>
        </article>
    </section>
@endsection