<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroCierre extends Model
{
    protected $table = 'registro_cierre';
    public $timestamps = false; // Indicamos a Laravel que no gestione los campos created_at y updated_at

    public function usuarioCerro()
    {
        return $this->belongsTo(User::class, 'cerro', 'id');
    }

    public function usuarioIngreso()
    {
        return $this->belongsTo(User::class, 'ingreso', 'id');
    }

    public function fuenteContacto()
    {
        return $this->belongsTo(FuenteContacto::class, 'fuente_contacto', 'id');
    }

    protected $fillable = [
        'cerro', 'ingreso', 'monto_propiedad', 'recurso', 'fuente_contacto', 'genero', 'rango_edad', 'estado_civil',
        // Agrega otros campos aquí si necesitas asignación masiva
    ];
}
