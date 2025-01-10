<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
 
    public function run()
    {
        $this->call([
            AlumnosTableSeeder::class,     // Primero, para que existan alumnos
            AsignaturasTableSeeder::class, // Segundo, para que existan asignaturas
            NotasTableSeeder::class,       // Tercero, ya que depende de los anteriores
        ]);
    }




}
