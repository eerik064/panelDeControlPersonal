<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\CheckAge;


Route::get('/', [AuthController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware([CheckAge::class . ':user'])->group(function () {

Route::get('/inicio', [TareaController::class, 'inicio'])->name('inicio');

// Rutas para Tareas
Route::get('/tareas', [TareaController::class, 'index'])->name('tareas');
Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
Route::patch('/tareas/{tarea}/completar', [TareaController::class, 'completar'])->name('tareas.completar');
Route::delete('/tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');
Route::get('/tareas/historial', [TareaController::class, 'historial'])->name('tareas.historial');
Route::patch('/tareas/{tarea}/reactivar', [TareaController::class, 'reactivar'])->name('tareas.reactivar');

// Ruta para Perfil
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');

// Rutas para Contacto
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

});

//A
