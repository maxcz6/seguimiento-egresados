<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = true;

    protected $fillable = ['usuario', 'clave', 'rol'];
    protected $hidden = ['clave'];

    public function getAuthPassword()
    {
        return $this->clave;
    }
}
