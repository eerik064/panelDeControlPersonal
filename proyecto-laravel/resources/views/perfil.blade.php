@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
    <section id="perfil" class="max-w-2xl mx-auto py-8">
        

        <div class="text-center bg-white border border-gray-100 shadow-sm p-6 rounded-lg">
            <div class="h-24 w-24 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-700 font-bold text-3xl mx-auto mb-4 shadow-inner uppercase">
               
                {{ substr($usuario->name, 0, 2) }}
            </div>
            
            <h2 class="text-2xl font-bold text-gray-900">{{ $usuario->name }}</h2>
            
            <div class="mt-8 bg-gray-50 p-4 rounded-lg border border-gray-100 text-left">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Detalles de la cuenta</h3>
                <p class="text-sm text-gray-600 mb-1"><strong>Correo:</strong> {{ $usuario->email }}</p>
                <p class="text-sm text-gray-600 mb-1"><strong>Rol:</strong> {{ $usuario->rol ?? 'Usuario' }}</p>
                <p class="text-sm text-gray-600"><strong>Estado:</strong> {{ $usuario->estado ?? 'Activo' }}</p>
            </div>
        </div>

    </section>
@endsection