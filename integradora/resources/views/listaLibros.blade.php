@extends('layouts.app')

@section('title')

@section('content')

    <h2>Catalogo de Libros</h2>
    
    <p>Bienvenidos a la libreria El lapiz. Aqui se encuentra las historias mas emocianantes.</p>

    <p>Hay {{ count($libros) }} libros en el catalogo.</p>
    <br>
    <ul class="text-yellow-500">
        @foreach($libros as $libro)
            <li >{{ $libro->titulo }} - Precio: {{ $libro->precio }} Bs</li>
        @endforeach
    </ul>
     <br>   
    <a href="{{ route('formulario') }}" >Agregar nuevo libro</a>

    <br><br>

    <p>Catalogo atendido por Erik Edil Espindola Jimenez</p>

@endsection