<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    public function run()
    {
        // Crear un alumno
        $alumno = Alumno::create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com'
        ]);

        // Crear un perfil para el alumno
        Perfil::create([
            'alumno_id' => $alumno->id,
            'biografia' => 'Este es el perfil de Juan Pérez.'
        ]);
    }
}
