<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas'; // Nombre de la tabla asociada

    protected $fillable = [
        'alumno_id',
        'asignatura_id',
        'nota',
    ];

    // Relación con Alumno (N:1)
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    // Relación con Asignatura (N:1)
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'asignatura_id');
    }
}
