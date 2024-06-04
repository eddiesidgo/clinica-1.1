<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasTable extends Migration
{
    public function up()
    {
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('DUI');
            $table->foreign('DUI')->references('DUI')->on('pacientes')->onDelete('cascade');
            $table->unsignedBigInteger('Paciente');
            $table->string('correo_electronico'); 
            $table->text('Receta');
            $table->string('codigo')->nullable();
            $table->string('firma')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recetas');
    }
};
