<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use App\Models\FuenteContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegistroCierreController extends Controller
{
    public function index()
{
    // Obtén usuarios con permisos igual a 2 y activos igual a 1
    $usuarios = User::where('permisos_id', 2)
                    ->where('activo', 1)
                    ->pluck('nombre', 'id'); // Obtén solo los nombres de usuario como un array asociativo     
    $fuentes_contacto = FuenteContacto::all();
    return view('registrocierre', compact('usuarios', 'fuentes_contacto'));
}

    // Método para mostrar el formulario de creación
    // Método para almacenar un nuevo registro en la base de datos
    public function store(Request $request)
{
    // Validaciones y almacenamiento de datos en la base de datos
    $request->validate([
        'cerro' => 'required|numeric',
        'ingreso' => 'required|numeric',
        'monto_propiedad' => 'required|string',
        'recurso' => 'required|string',
        'fuente_contacto' => 'required|integer|not_in:0', // Asegura que el valor sea distinto de 0
        'genero' => 'required|string|not_in:0', // Asegura que el valor sea distinto de 0
        'rango_edad' => 'required|string|not_in:0', // Asegura que el valor sea distinto de 0
        'estado_civil' => 'required|string|not_in:0', // Asegura que el valor sea distinto de 0
    ]);

    // Crea el registro de cierre en la base de datos
    $registro = RegistroCierre::create($request->all());

    // Redirige a la página de éxito con un mensaje
    return redirect()->back();
}
}
