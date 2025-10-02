<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;   // 👈 Para notificaciones (recuperación de contraseña, etc.)
use Illuminate\Support\Facades\Hash;       // 👈 Para encriptar la clave

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Configuración de la tabla
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';   // 👈 asegúrate que este sea el nombre real en tu BD
    public $timestamps = true;              // ⚠️ pon "false" si tu tabla no tiene created_at / updated_at

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'usuario',
        'clave',
        'rol',
        'dni',   // soportar registro dinámico
        'ruc',
    ];

    // Campos ocultos en serialización
    protected $hidden = [
        'clave',
        'remember_token',
    ];

    // Mutadores y Accesores
    public function getAuthPassword()
    {
        return $this->clave;
    }

    // Mutador automático para encriptar clave al guardar
    public function setClaveAttribute($value)
    {
        // Evita doble encriptado si ya está hasheada
        $this->attributes['clave'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    // Validar rol del usuario
    public function hasRole($role)
    {
        return $this->rol === $role;
    }

    // Verificar si es administrador
    public function isAdmin()
    {
        return $this->hasRole('administrador');
    }

    // Verificar si es tutor
    public function isTutor()
    {
        return $this->hasRole('tutor');
    }

    // Verificar si es egresado
    public function isEgresado()
    {
        return $this->hasRole('egresado');
    }

    // Verificar si es empresa
    public function isEmpresa()
    {
        return $this->hasRole('empresa');
    }
}
