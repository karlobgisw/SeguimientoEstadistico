<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\DiaSemana;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();

        return view('actividades.index', [
            'actividades' => $actividades,
        ]);
    }

    public function create()
    {
        $diasSemana = DiaSemana::all();

        return view('actividades.create', [
            'diasSemana' => $diasSemana,
        ]);
    }

    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad->nombre_actividad = $request->input('nombre_actividad');

        $actividad->save();

        return redirect()->route('actividades.index');
    }

    public function edit($id)
    {
        $actividad = Actividad::find($id);
        $diasSemana = DiaSemana::all();

        return view('actividades.edit', [
            'actividad' => $actividad,
            'diasSemana' => $diasSemana,
        ]);
    }

    public function update(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->nombre_actividad = $request->input('nombre_actividad');

        $actividad->save();

        return redirect()->route('actividades.index');
    }

    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->delete();

        return redirect()->route('actividades.index');
    }
}
