<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->string('antecedentes')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicamento')->nullable();
            $table->string('histquirurgico')->nullable();
            $table->unsignedBigInteger('id_Paciente');
            $table->foreign('id_Paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
};
