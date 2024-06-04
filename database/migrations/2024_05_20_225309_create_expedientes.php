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
            $table->id('idExp')->unique();
            $table->unsignedBigInteger('id_Paciente'); 
            $table->foreign('id_Paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->string('DUI')->nullable();
            $table->foreign('DUI')->references('DUI')->on('pacientes')->onDelete('cascade');
            $table->text('antecedentes')->nullable();
            $table->text('alergias')->nullable();
            $table->text('medicamento')->nullable();
            $table->text('histquirurgico')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
};
