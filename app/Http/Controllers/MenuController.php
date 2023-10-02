<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MenuController extends Controller
{
    // Renderiza la vista menu
    // En el controlador de menú
public function renderMenu()
{
    // Verifica si el usuario está autenticado
    if (! auth()->check()) {
        return redirect('/login');
    }

    // Renderiza la vista de menú
    return view('menu');
}

}