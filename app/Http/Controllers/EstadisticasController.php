<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        $usuarios = User::pluck('nombre', 'id');
        $stats = $this->generateStats();
        $ingresoStats = $this->generateColumnStats('ingreso');
        $recursoStats = $this->generateColumnStats('recurso');
        $fuenteContactoStats = $this->generateColumnStats('fuente_contacto');
        $generoStats = $this->generateColumnStats('genero');
        $rangoEdadStats = $this->generateColumnStats('rango_edad');
        $estadoCivilStats = $this->generateColumnStats('estado_civil');
        
        // Lógica para obtener el permiso del usuario actual
        $permiso = auth()->user()->permisos_id;

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
