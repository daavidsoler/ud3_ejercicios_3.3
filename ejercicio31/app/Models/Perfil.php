<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = ['alumno_id', 'biografia'];

    // Relación inversa 1:1 con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
