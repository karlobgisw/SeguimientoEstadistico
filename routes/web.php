<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController; // Importa el controlador
use App\Http\Controllers\AgendaController; // Importa el controlador
use App\Http\Controllers\AuthController; // Importa el controlador
use App\Http\Controllers\MenuController; // Importa el controlador
use App\Http\Controllers\LogoutController; // Importa el controlador

//RUTAS_ActividadController

Route::get('/actividades', [ActividadController::class, 'index'])->middleware('auth');

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

// Rutas de AuthController
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'store'])->name('login');

// Ruta principal
Route::get('/', function () {
    // Verificar si el usuario está autenticado
    if (auth()->check()) {
        // Si está autenticado, redirigir a la página de menú
        return redirect('/menu');
    } else {
        // Si no está autenticado, redirigir a la página de login
        return redirect('/login');
    }
});

// Ruta de MenuController
Route::get('/menu', [MenuController::class, 'renderMenu'])->name('menu')->middleware('auth');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

