<?php
namespace App\Http\Controllers;

use App\Models\User; // Asegúrate de importar el modelo User

class InicioAdminController extends Controller
{
    public function index()
    {
        // Obtener solo los agentes con permisos 'limited'
        $agentes = User::whereHas('permisos', function ($query) {
            $query->where('type', 'limited');
        })->get();

        // Pasar los datos a la vista
        return view('inicioadmin', compact('agentes'));
    }
}



