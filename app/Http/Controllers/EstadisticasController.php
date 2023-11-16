<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstadisticasController extends Controller
{
    public function index()
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
        $stats = $this->generateStats();
        $ingresoStats = $this->generateColumnStats2('ingreso');
        $recursoStats = $this->generateColumnStats('recurso');
        $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto');
        $generoStats = $this->generateColumnStats('genero');
        $rangoEdadStats = $this->generateColumnStats('rango_edad');
        $estadoCivilStats = $this->generateColumnStats('estado_civil');

        return view('estadisticas', compact('usuarios', 'stats', 'permiso', 'ingresoStats', 'recursoStats', 'fuenteContactoStats', 'generoStats', 'rangoEdadStats', 'estadoCivilStats'));
    }

    // Otras funciones del controlador...

    // Función para generar estadísticas de una columna específica
    private function generateColumnStats($column)
    {
        return DB::table('registro_cierre')
            ->select($column, DB::raw('count(*) as count'))
            ->groupBy($column)
            ->get();
    }

    private function generateColumnStats2($column)
    {
        return DB::table('registro_cierre')
            ->join('users', 'registro_cierre.ingreso', '=', 'users.id')
            ->select('users.nombre as '.$column, DB::raw('count(*) as count'))
            ->groupBy('users.nombre')
            ->get();
    }

    private function generateColumnStats3($column)
    {
        return DB::table('registro_cierre')
            ->join('fuentes_contacto', 'registro_cierre.fuente_contacto', '=', 'fuentes_contacto.id')
            ->select('fuentes_contacto.nombre_fuente as '.$column, DB::raw('count(*) as count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('fuentes_contacto.nombre_fuente')
            ->get();
    }

    public function generateStats()
    {
        // Obtén el conteo de cierres y la suma de montos por usuario
        $stats = RegistroCierre::join('users', 'registro_cierre.cerro', '=', 'users.id')
            ->select('cerro', 'users.nombre', DB::raw('count(*) as cierres_count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('cerro', 'users.nombre')
            ->get();

        return $stats;
    }
}
