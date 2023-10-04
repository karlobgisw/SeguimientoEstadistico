<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller

{
    
    public function store(Request $request)
{
    $request->validate([
        'sir' => ['required', 'alpha', 'min:3', 'max:50'],
        'password' => ['required', Password::min(8)->letters()->numbers()->symbols()->uncompromised()],
    ], [
        'sir.required' => 'El nombre es obligatorio.',
        'sir.alpha' => 'El nombre debe contener solo caracteres alfabéticos.',
        'sir.min' => 'El nombre debe tener al menos :min caracteres.',
        'sir.max' => 'El nombre no debe tener más de :max caracteres.',
        'password.required' => 'La contraseña es obligatoria.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres y contener letras, números y caracteres especiales.',
    ]);

    $user = User::where('sir', $request->input('sir'))->first();

    if (! $user || ! Hash::check($request->input('password'), $user->password)) {
        return response()->json(['error' => 'Credenciales no válidas'], 401);
    }

    Auth::login($user);

    // Redirecciona a la página de menú
    return redirect()->route('menu');
}



    

    

}
