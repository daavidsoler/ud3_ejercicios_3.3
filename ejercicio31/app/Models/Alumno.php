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
}
