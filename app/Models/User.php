<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'password',
        'type',
    ];
    
    public $timestamps = false;

    public function permissions()
    {
        return $this->belongsToMany(\App\Models\Permission::class);
    }
}
