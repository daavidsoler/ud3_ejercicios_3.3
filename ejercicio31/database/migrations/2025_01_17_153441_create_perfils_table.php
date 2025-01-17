<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilsTable extends Migration
{
    public function up()
    {
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id')->unique();
            $table->text('biografia')->nullable();
            $table->timestamps();
    
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('perfils');
    }
}