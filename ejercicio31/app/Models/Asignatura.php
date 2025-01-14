<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $table = 'asignaturas'; // Nombre de la tabla asociada

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación con Notas (1:N)
    public function notas()
    {
        return $this->hasMany(Nota::class, 'asignatura_id');
    }
}
