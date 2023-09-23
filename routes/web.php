<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController; // Importa el controlador
use App\Http\Controllers\AgendaController; // Importa el controlador

//RUTAS_ActividadController

Route::get('/actividades', [ActividadController::class, 'index']);

// Mostrar el formulario de creación (puedes omitir esta ruta si no es necesaria sin vistas)
//Route::get('/actividades/create', [ActividadController::class, 'create']);

// Ruta para la prueba de POST sin protección CSRF
Route::post('/actividades', [ActividadController::class, 'store'])->withoutMiddleware(['web']);

// Mostrar una actividad específica
Route::get('/actividades/{id}', [ActividadController::class, 'show']);

// Mostrar el formulario de edición (puedes omitir esta ruta si no es necesaria sin vistas)
Route::get('/actividades/{id}/edit', [ActividadController::class, 'edit']);

// Actualizar una actividad existente sin protección CSRF
Route::put('/actividades/{id}', [ActividadController::class, 'update'])->withoutMiddleware(['web']);

// Actualizar una actividad existente utilizando PATCH (puedes omitir esta ruta si no es necesaria sin vistas)
Route::patch('/actividades/{id}', [ActividadController::class, 'update']);

// Eliminar una actividad existente sin protección CSRF
Route::delete('/actividades/{id}', [ActividadController::class, 'destroy'])->withoutMiddleware(['web']);


//RUTAS AgendaController


// Ruta para listar todas las agendas
Route::get('/agendas', [AgendaController::class, 'index']);

// Ruta para mostrar el formulario de creación de agenda (no es necesario para una API sin vistas)

// Ruta para almacenar una nueva agenda sin protección CSRF
Route::post('/agendas', [AgendaController::class, 'store'])->withoutMiddleware(['web']);

// Ruta para mostrar el formulario de edición de agenda (no es necesario para una API sin vistas)

// Ruta para actualizar una agenda existente sin protección CSRF
Route::put('/agendas/{id}', [AgendaController::class, 'update'])->withoutMiddleware(['web']);


// Ruta para eliminar una agenda sin protección CSRF
Route::delete('/agendas/{id}', [AgendaController::class, 'destroy'])->withoutMiddleware(['web']);

