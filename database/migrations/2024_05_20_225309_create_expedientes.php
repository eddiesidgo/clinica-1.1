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
            $table->id('idExp'); // Automatically creates an auto-incrementing primary key
            $table->unsignedBigInteger('id_Paciente'); // Foreign key column
            $table->text('antecedentes')->nullable();
            $table->text('alergias')->nullable();
            $table->text('medicamento')->nullable();
            $table->text('histquirurgico')->nullable();
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('id_Paciente')->references('id')->on('pacientes')->onDelete('cascade');
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
