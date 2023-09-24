<?php
namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Actividad;
use App\Models\DiaSemana;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agendas = Agenda::all();

        return view('agenda.index', [
            'agendas' => $agendas,
        ]);
    }

    public function create()
    {
        $diasSemana = DiaSemana::all();
        $actividades = Actividad::all();

        return view('agenda.create', [
            'diasSemana' => $diasSemana,
            'actividades' => $actividades,
        ]);
    }

    public function store(Request $request)
    {
        $agenda = new Agenda();
        $agenda->dia_semana_id = $request->input('dia_semana_id');
        $agenda->momento_dia = $request->input('momento_dia');
        $agenda->actividad_id = $request->input('actividad_id');

        $agenda->save();

        return redirect()->route('agenda.index');
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);
        $diasSemana = DiaSemana::all();
        $actividades = Actividad::all();

        return view('agenda.edit', [
            'agenda' => $agenda,
            'diasSemana' => $diasSemana,
            'actividades' => $actividades,
        ]);
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        $agenda->dia_semana_id = $request->input('dia_semana_id');
        $agenda->momento_dia = $request->input('momento_dia');
        $agenda->actividad_id = $request->input('actividad_id');

        $agenda->save();

        return redirect()->route('agenda.index');
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        return redirect()->route('agenda.index');
    }
}