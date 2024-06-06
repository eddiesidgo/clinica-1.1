<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialConsulta extends Model
{
    use HasFactory;

    protected $table = 'historial_consulta'; // Nombre de la vista en la base de datos

    protected $primaryKey = 'idConsulta'; // Clave primaria de la vista

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'idConsulta',
        'start_date',
        'diagnostico',
        'estado',
        'nombre_paciente'
    ];

}

// Obtener todos los registros del historial de consulta
$historialConsultas = HistorialConsulta::all();


