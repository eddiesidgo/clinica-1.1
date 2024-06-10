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
        Schema::create('events', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('DUI')->nullable();
            $table->foreign('DUI')->references('DUI')->on('pacientes')->onDelete('cascade');
            $table->unsignedBigInteger('id_Paciente');
            $table->foreign('id_Paciente')->references('id')->on('pacientes')->onDelete('cascade');
            $table->string('nombre');
            $table->string('event');
            $table->datetime('start_date');
            $table->datetime('end_date');
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
        Schema::dropIfExists('events');
    }
};
