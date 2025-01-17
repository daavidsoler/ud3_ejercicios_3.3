<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos'; 

    protected $fillable = [
        'nombre',
        'email',
    ];

    
    public function notas()
    {
        return $this->hasMany(Nota::class, 'alumno_id');
    }

    
    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class, 'notas', 'alumno_id', 'asignatura_id')
                    ->withPivot('nota', 'created_at', 'updated_at');
    }

   
    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'alumno_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'alumno_id');
    }
}
