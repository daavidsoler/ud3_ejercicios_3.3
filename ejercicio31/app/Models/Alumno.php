<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos'; // Nombre de la tabla asociada

    protected $fillable = [
        'nombre',
        'email',
    ];

    // Relación con Notas (1:N)
    public function notas()
    {
        return $this->hasMany(Nota::class, 'alumno_id');
    }

    // Relación con Asignaturas (N:N a través de la tabla notas)
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'notas', 'alumno_id', 'asignatura_id')
                    ->withPivot('nota', 'created_at', 'updated_at');
    }

    // Relación 1:1 con Perfil
    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'alumno_id');
    }
}
