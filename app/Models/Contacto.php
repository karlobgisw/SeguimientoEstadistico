<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'correo',
        'posible',
        'clasificacion',
        'llamada',
        'contestada',
        'interesado',
        'cita',
        'clave_sir',
        'fovissste',
        'infonavit',
        'bancario',
        'comentario',
        'valor',
        'semana',
        'mes',
        'user_id',
        'fuente_contacto_id',
    ];
    public function fuenteContacto()
    {
        return $this->belongsTo('App\Models\FuenteContacto', 'fuente_contacto_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function getContactos()
    {
        return Contacto::all();
    }

    public static function getContactoById($id)
    {
        return Contacto::findOrFail($id);
    }

    public function createContacto($data)
    {
        $contacto = new Contacto();
        $contacto->fill($data);
        $contacto->save();

        return $contacto;
    }

    public function updateContacto($id, $data)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->fill($data);
        $contacto->save();

        return $contacto;
    }

    public function deleteContacto($id)
    {
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();

        return $contacto;
    }
}

