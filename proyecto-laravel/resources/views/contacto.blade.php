@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
    <section id="contacto" class="max-w-lg mx-auto">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Contacto</h2>
        
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form id="form-envio" method="POST" action="{{ route('contacto.store') }}" novalidate class="space-y-5">
            @csrf
            
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
               
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('nombre') border-red-500 @enderror">
                
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('email') border-red-500 @enderror">
            
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 outline-none transition @error('mensaje') border-red-500 @enderror">{{ old('mensaje') }}</textarea>
              
                @error('mensaje')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-md shadow-sm transition">
                Enviar mensaje
            </button>
        </form>
    </section>
@endsection