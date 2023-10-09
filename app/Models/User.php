<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'password',
        'permisos_id', // Asegúrate de tener este campo en tu tabla users
    ];
    
    public $timestamps = false;

   
    public function permisos()
    {
        return $this->belongsTo(Permission::class, 'permisos_id');
    }
}
