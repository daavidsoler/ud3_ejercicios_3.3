<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Verificar o crear el alumno
        $alumno = Alumno::firstOrCreate(
            ['email' => 'juan.perez@example.com'], // Condición para buscar
            ['nombre' => 'Juan Pérez'] // Datos para crear si no existe
        );

        // Crear posts para el alumno
        Post::create([
            'alumno_id' => $alumno->id,
            'titulo' => 'Primer Post',
            'contenido' => 'Este es el contenido del primer post.'
        ]);

        Post::create([
            'alumno_id' => $alumno->id,
            'titulo' => 'Segundo Post',
            'contenido' => 'Este es el contenido del segundo post.'
        ]);
    }
}
