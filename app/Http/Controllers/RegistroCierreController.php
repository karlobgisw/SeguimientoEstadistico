<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use App\Models\FuenteContacto;
use Illuminate\Http\Request;

class RegistroSCRUDController extends Controller
{
    public function index()
    {
        $registros = RegistroCierre::all();
        $usuarios = User::all();
        $fuentes_contacto = FuenteContacto::all();
        $permiso = 'full';

        return view('registroscrud.index', compact('registros', 'usuarios', 'fuentes_contacto', 'permiso'));
    }

    public function edit($id)
    {
        $registro = RegistroCierre::findOrFail($id);
        $usuarios = User::where('permisos_id', 2)
                        ->where('activo', 1)
                        ->pluck('nombre', 'id');
        $fuentes_contacto = FuenteContacto::pluck('nombre_fuente', 'id');
        $permiso = 'full';

        return view('registroscrud.edit', compact('registro', 'usuarios', 'fuentes_contacto', 'permiso'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cerro' => 'required|numeric',
            'ingreso' => 'required|numeric',
            'monto_propiedad' => 'required|string',
            'recurso' => 'required|string',
            'fuente_contacto' => 'required|integer|not_in:0',
            'genero' => 'required|string|not_in:0',
            'rango_edad' => 'required|string|not_in:0',
            'estado_civil' => 'required|string|not_in:0',
        ]);

        $registro = RegistroCierre::findOrFail($id);
        $registro->update($request->all());

        return redirect()->route('registroscrud.index')->with('success', 'Registro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $registro = RegistroCierre::findOrFail($id);
        $registro->delete();

        return redirect()->route('registroscrud.index')->with('success', 'Registro eliminado exitosamente');
    }
}
