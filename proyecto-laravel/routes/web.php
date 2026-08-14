<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ContactoController;

// Vista de inicio (puede seguir como Closure ya que es estática)
Route::get('/', function () {
    return view('inicio');
})->name('inicio');

// Rutas para Tareas
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas');
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');

// Ruta para Perfil
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');

// Rutas para Contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');