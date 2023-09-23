<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Actividad;
use App\Models\DiaSemana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgendaController extends Controller
{
    // Listar todas las agendas
    public function index()
    {
        $agendas = Agenda::all();

        return response()->json($agendas);
    }

    // Mostrar el formulario de creación de agenda (no es necesario para una API sin vistas)

    // Almacenar una nueva agenda
    public function store(Request $request)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'dia_semana_id' => 'required',
            'momento_dia' => 'required',
            'actividad_id' => 'required',
        ]);

        // Si la validación falla, retornar errores en formato JSON
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Crear una nueva instancia de Agenda y guardarla en la base de datos
        $agenda = new Agenda();
        $agenda->dia_semana_id = $request->input('dia_semana_id');
        $agenda->momento_dia = $request->input('momento_dia');
        $agenda->actividad_id = $request->input('actividad_id');
        $agenda->save();

        return response()->json(['message' => 'Agenda creada correctamente']);
    }

    // Mostrar el formulario de edición de agenda (no es necesario para una API sin vistas)

    // Actualizar una agenda existente
    public function update(Request $request, $id)
    {
        // Validar los datos de la solicitud
        $validator = Validator::make($request->all(), [
            'dia_semana_id' => 'required',
            'momento_dia' => 'required',
            'actividad_id' => 'required',
        ]);

        // Si la validación falla, retornar errores en formato JSON
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Buscar la agenda por su ID y actualizar sus datos
        $agenda = Agenda::find($id);
        $agenda->dia_semana_id = $request->input('dia_semana_id');
        $agenda->momento_dia = $request->input('momento_dia');
        $agenda->actividad_id = $request->input('actividad_id');
        $agenda->save();

        return response()->json(['message' => 'Agenda actualizada correctamente']);
    }

    // Eliminar una agenda
    public function destroy($id)
    {
        // Buscar la agenda por su ID y eliminarla de la base de datos
        $agenda = Agenda::find($id);
        $agenda->delete();

        return response()->json(['message' => 'Agenda eliminada correctamente']);
    }
}
