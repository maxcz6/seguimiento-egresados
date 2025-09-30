<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario'; 
    protected $primaryKey = 'id_usuario'; 
    public $timestamps = true;

    protected $fillable = [
        'usuario',
        'clave',
        'rol',
    ];

    protected $hidden = [
        'clave',
    ];

    // 👇 Importante: Laravel usará este campo como contraseña
    public function getAuthPassword()
    {
        return $this->clave;
    }
}
