<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use App\Models\FuenteContacto;
use Illuminate\Http\Request;

class RegistroSCRUDController extends Controller
{
    public function index(Request $request)
{
    
    $registros = RegistroCierre::all();
    $usuarios = User::all();
    $fuentes_contacto = FuenteContacto::all();
    $permiso = 'full';

    // Verifica si se proporcionó una fecha en la solicitud
    if ($request->has('fechaFiltro')) {
        $fechaFiltro = $request->input('fechaFiltro');
        $registros = RegistroCierre::whereDate('created_at', $fechaFiltro)->get();
    }

    return view('registroscrud.index', compact('registros', 'usuarios', 'fuentes_contacto', 'permiso'));
}


    public function edit($id)
    {
        $registro = RegistroCierre::findOrFail($id);
        $usuarios = User::all();
        $fuentes_contacto = FuenteContacto::all();
        $permiso = 'full';

        return view('registroscrud.edit', compact('registro', 'usuarios', 'fuentes_contacto', 'permiso'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        // ... other validation rules ...
        'fechaCreacion' => 'required|date_format:Y-m-d\TH:i',
    ]);

    // Convert the date format
    $fechaCreacion = $request->input('fechaCreacion');
    $fechaCreacionFormatted = \Carbon\Carbon::createFromFormat('Y-m-d\TH:i', $fechaCreacion)->format('Y-m-d H:i:s');

    $registro = RegistroCierre::findOrFail($id);

    // Update the fields without 'created_at'
    $registro->update([
        'cerro' => $request->input('cerroModal'),
        'ingreso' => $request->input('ingresoModal'),
        'monto_propiedad' => $request->input('montoPropiedadModal'),
        'recurso' => $request->input('recursoModal'),
        'fuente_contacto' => $request->input('fuente_contacto'),
        'genero' => $request->input('genero'),
        'rango_edad' => $request->input('rango_edad'),
        'estado_civil' => $request->input('estado_civil'),
        // ... other fields ...
    ]);

    return redirect()->route('registroscrud.index')->with('success', 'Registro actualizado exitosamente');
}

    public function destroy($id)
    {
        $registro = RegistroCierre::findOrFail($id);
        $registro->delete();

        return redirect()->route('registroscrud.index')->with('success', 'Registro eliminado exitosamente');
    }
}
