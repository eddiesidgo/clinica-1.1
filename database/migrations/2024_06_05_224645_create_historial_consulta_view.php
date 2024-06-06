<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateHistorialConsultaView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW historial_consulta AS
            SELECT c.idConsulta, e.start_date, c.diagnostico, c.estado, p.nombre AS nombre_paciente
            FROM consulta c
            JOIN events e ON c.id_cita = e.id
            JOIN pacientes p ON e.id_paciente = p.id;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS historial_consulta');
    }
}
