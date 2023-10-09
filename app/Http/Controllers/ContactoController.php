<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    
// ContactoController.php

public function mostrarContactosCirculoInfluencia()
{
    // Obtener el user_id del usuario autenticado
    $user_id = auth()->user()->id;

    // Filtrar los contactos por el user_id
    $contactos = Contacto::where('user_id', $user_id)->get();

    // Pasa los contactos a la vista
    return view('circuloinf', ['contactos' => $contactos]);
}

    
    

}
