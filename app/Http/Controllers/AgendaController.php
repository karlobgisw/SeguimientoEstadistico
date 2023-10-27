<?php
namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Actividad;
use App\Models\DiaSemana;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        if ($user->permisos->type === 'limited') {
            // Usuario agente
            $permiso = 'limited';
        } elseif ($user->permisos->type === 'full') {
            // Usuario staff
            $permiso = 'full';
        }
        // Obtener el user_id del usuario autenticado
        $user_id = auth()->user()->id;

        $agendaData = Agenda::where('user_id', $user_id)
            ->select('ano', 'mes', 'semana')
            ->distinct()
            ->get();

        $diccionario = [];

        foreach ($agendaData as $item) {
            $ano = $item->ano;
            $mes = $item->mes;
            $semana = $item->semana;

            if (!isset($diccionario[$ano])) {
                $diccionario[$ano] = [];
            }

            if (!isset($diccionario[$ano][$mes])) {
                $diccionario[$ano][$mes] = [];
            }

            $diccionario[$ano][$mes][] = $semana;
        }



        return view('agenda', [
            'diccionario' => $diccionario,
            'permiso' => $permiso,
        ]);
    }
    public function veragenda($id)
    {
        $user = Auth::guard('web')->user();
        if ($user->permisos->type === 'limited') {
            // Usuario agente
            $permiso = 'limited';
        } elseif ($user->permisos->type === 'full') {
            // Usuario staff
            $permiso = 'full';
        }

        $agendaData = Agenda::where('user_id', $id)
            ->select('ano', 'mes', 'semana')
            ->distinct()
            ->get();

        $diccionario = [];

        foreach ($agendaData as $item) {
            $ano = $item->ano;
            $mes = $item->mes;
            $semana = $item->semana;

            if (!isset($diccionario[$ano])) {
                $diccionario[$ano] = [];
            }

            if (!isset($diccionario[$ano][$mes])) {
                $diccionario[$ano][$mes] = [];
            }

            $diccionario[$ano][$mes][] = $semana;
        }



        return view('agenda', [
            'diccionario' => $diccionario,
            'permiso' => $permiso,
            'id' => $id,
        ]);
    }

    public function ver_agenda($ano, $mes, $semana)
    {
        $user = Auth::guard('web')->user();
        if ($user->permisos->type === 'limited') {
            // Usuario agente
            $permiso = 'limited';
        } elseif ($user->permisos->type === 'full') {
            // Usuario staff
            $permiso = 'full';
        }
        // Obtener el user_id del usuario autenticado
        $user_id = auth()->user()->id;

        $registros = Agenda::where('ano', $ano)
        ->where('mes', $mes)
        ->where('semana', $semana)
        ->where('user_id', $user_id)
        ->get();

        $agendaData = Agenda::where('user_id', $user_id)
            ->select('ano', 'mes', 'semana')
            ->distinct()
            ->get();

        $diccionario = [];

        foreach ($agendaData as $item) {
            $ano = $item->ano;
            $mes = $item->mes;
            $semana = $item->semana;

            if (!isset($diccionario[$ano])) {
                $diccionario[$ano] = [];
            }

            if (!isset($diccionario[$ano][$mes])) {
                $diccionario[$ano][$mes] = [];
            }

            $diccionario[$ano][$mes][] = $semana;
        }

    
        return view('agenda_ver', [
            'diccionario' => $diccionario,
            'permiso' => $permiso,
            'registros' => $registros,
        ]);
    }
    public function ver_agenda_admin($ano, $mes, $semana, $id)
    {
        $user = Auth::guard('web')->user();
        if ($user->permisos->type === 'limited') {
            // Usuario agente
            $permiso = 'limited';
        } elseif ($user->permisos->type === 'full') {
            // Usuario staff
            $permiso = 'full';
        }
        // Obtener el user_id del usuario autenticado

        $registros = Agenda::where('ano', $ano)
        ->where('mes', $mes)
        ->where('semana', $semana)
        ->where('user_id', $id)
        ->get();

        $agendaData = Agenda::where('user_id', $id)
            ->select('ano', 'mes', 'semana')
            ->distinct()
            ->get();

        $diccionario = [];

        foreach ($agendaData as $item) {
            $ano = $item->ano;
            $mes = $item->mes;
            $semana = $item->semana;

            if (!isset($diccionario[$ano])) {
                $diccionario[$ano] = [];
            }

            if (!isset($diccionario[$ano][$mes])) {
                $diccionario[$ano][$mes] = [];
            }

            $diccionario[$ano][$mes][] = $semana;
        }

    
        return view('agenda_ver', [
            'diccionario' => $diccionario,
            'permiso' => $permiso,
            'registros' => $registros,
            'id' => $id,
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
        $agenda->estado = $request->input('estado');
        $agenda->actividad_id = $request->input('actividad_id');
        $agenda->user_id = $request->input('user_id');
        $agenda->ano = $request->input('ano');
        $agenda->mes = $request->input('mes');
        $agenda->semana = $request->input('semana');

        $agenda->save();
        return back();
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

    public function update(Request $request)
    {
        $id = $request->input('id');
        $agenda = Agenda::find($id);
        $agenda->dia_semana_id = $request->input('dia_semana_id');
        $agenda->momento_dia = $request->input('momento_dia');
        $agenda->estado = $request->input('estado');

        $agenda->save();
    }
    
    public function updateEstado(Request $request)
    {
        $id = $request->input('id');
        $agenda = Agenda::find($id);
        $agenda->estado = $request->input('estado');

        $agenda->save();
    }

    public function destroy($id)
    {
        $agenda = Agenda::find($id);
        $agenda->delete();

        return redirect()->route('agenda.index');
    }
}