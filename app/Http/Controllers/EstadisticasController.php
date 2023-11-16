<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstadisticasController extends Controller
{
    public function index(Request $request)
    { 
        // Lógica para obtener el permiso del usuario actual
        $permiso = auth()->user()->permisos_id;

        $user = Auth::guard('web')->user();
        if ($user->permisos->type === 'limited') {
            // Usuario agente
            $permiso = 'limited';
        } elseif ($user->permisos->type === 'full') {
            // Usuario staff
            $permiso = 'full';
        }

        // Verifica si el usuario está autenticado
        if (! auth()->check()) {
            return redirect('/login');
        }

        $usuarios = User::pluck('nombre', 'id');

        // Verifica si se enviaron fechas en la solicitud
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        // Si se proporcionan fechas, realiza la consulta con el filtro de fechas
        if ($fechaInicio && $fechaFin) {
            $stats = $this->generateStatsByDateRange($fechaInicio, $fechaFin);
            $ingresoStats = $this->generateColumnStats2('ingreso', $fechaInicio, $fechaFin);
            $recursoStats = $this->generateColumnStats('recurso', $fechaInicio, $fechaFin);
            $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto', $fechaInicio, $fechaFin);
            $generoStats = $this->generateColumnStats('genero', $fechaInicio, $fechaFin);
            $rangoEdadStats = $this->generateColumnStats('rango_edad', $fechaInicio, $fechaFin);
            $estadoCivilStats = $this->generateColumnStats('estado_civil', $fechaInicio, $fechaFin);
        } else {
            // Si no se proporcionan fechas, realiza la consulta sin filtro
            $stats = $this->generateStats();
            $ingresoStats = $this->generateColumnStats2('ingreso');
            $recursoStats = $this->generateColumnStats('recurso');
            $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto');
            $generoStats = $this->generateColumnStats('genero');
            $rangoEdadStats = $this->generateColumnStats('rango_edad');
            $estadoCivilStats = $this->generateColumnStats('estado_civil');
        }

        return view('estadisticas', compact('usuarios', 'stats', 'permiso', 'ingresoStats', 'recursoStats', 'fuenteContactoStats', 'generoStats', 'rangoEdadStats', 'estadoCivilStats'));
    }

    // Otras funciones del controlador...

    // Función para generar estadísticas de una columna específica con filtro de fechas
    private function generateColumnStats($column, $fechaInicio = null, $fechaFin = null)
    {
        $query = DB::table('registro_cierre');

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        return $query->select($column, DB::raw('count(*) as count'))
            ->groupBy($column)
            ->get();
    }

    private function generateColumnStats2($column, $fechaInicio = null, $fechaFin = null)
    {
        $query = DB::table('registro_cierre')
            ->join('users', 'registro_cierre.ingreso', '=', 'users.id');

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('registro_cierre.created_at', [$fechaInicio, $fechaFin]);
        }

        return $query->select('users.nombre as '.$column, DB::raw('count(*) as count'))
            ->groupBy('users.nombre')
            ->get();
    }

    private function generateColumnStats3($column, $fechaInicio = null, $fechaFin = null)
    {
        $query = DB::table('registro_cierre')
            ->join('fuentes_contacto', 'registro_cierre.fuente_contacto', '=', 'fuentes_contacto.id');

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('registro_cierre.created_at', [$fechaInicio, $fechaFin]);
        }

        return $query->select('fuentes_contacto.nombre_fuente as '.$column, DB::raw('count(*) as count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('fuentes_contacto.nombre_fuente')
            ->get();
    }

    // Función para generar estadísticas por fecha
    private function generateStatsByDateRange($fechaInicio, $fechaFin)
    {
        $stats = RegistroCierre::join('users', 'registro_cierre.cerro', '=', 'users.id')
            ->whereBetween('registro_cierre.created_at', [$fechaInicio, $fechaFin])
            ->select('cerro', 'users.nombre', DB::raw('count(*) as cierres_count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('cerro', 'users.nombre')
            ->get();

        return $stats;
    }

    // Resto del controlador...
}
