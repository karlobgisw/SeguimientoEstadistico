<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\DiaSemana;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    // Método para listar todas las actividades
    public function index()
    {
        $actividades = Actividad::all(); // Obtener todas las actividades de la base de datos
        return response()->json($actividades); // Devolver las actividades en formato JSON
    }

    // Método para mostrar el formulario de creación (puedes omitir esta acción si no es necesaria sin vistas)
    public function create()
    {
        // Lógica para mostrar el formulario de creación (si es necesario)
    }

    // Método para almacenar una nueva actividad
    public function store(Request $request)
    {
        // Lógica para almacenar una nueva actividad en la base de datos
        $actividad = new Actividad();
        $actividad->nombre_actividad = $request->input('nombre_actividad');
        $actividad->save();
        return response()->json(['message' => 'Actividad creada correctamente']); // Respuesta JSON de éxito
    }

    // Método para mostrar una actividad específica
    public function show($id)
    {
        $actividad = Actividad::find($id); // Buscar una actividad por su ID en la base de datos
        return response()->json($actividad); // Devolver la actividad en formato JSON
    }

    // Método para mostrar el formulario de edición (puedes omitir esta acción si no es necesaria sin vistas)
    public function edit($id)
    {
        // Lógica para mostrar el formulario de edición (si es necesario)
    }

    // Método para actualizar una actividad existente
    public function update(Request $request, $id)
    {
        // Lógica para actualizar una actividad existente en la base de datos
        $actividad = Actividad::find($id);
        $actividad->nombre_actividad = $request->input('nombre_actividad');
        $actividad->save();
        return response()->json(['message' => 'Actividad actualizada correctamente']); // Respuesta JSON de éxito
    }

    // Método para eliminar una actividad existente
    public function destroy($id)
    {
        // Lógica para eliminar una actividad existente de la base de datos
        $actividad = Actividad::find($id);
        $actividad->delete();
        return response()->json(['message' => 'Actividad eliminada correctamente']); // Respuesta JSON de éxito
    }
}
