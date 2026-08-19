@extends('layouts.app')

@section('title')

@section('content')

    <h2>Registrar Nuevo Libro</h2>
    <br>
    @if ($errors->any())
        <div>
            <ul class="text-red-500">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    <form action="{{ route('formulario') }}" method="POST">
        @csrf
        
        <label for="titulo">Ttitulo</label>
        <input type="text" id="titulo" name="titulo">
        
        <br><br>

        <label for="precio">Precio</label>
        <input id="precio" name="precio">

        <br><br>

        <button type="submit">Registrar libro</button>
    </form>

@endsection