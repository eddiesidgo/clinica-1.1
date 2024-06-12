<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'DUI',
        'nombre',
        'antecedentes',
        'alergias',
        'medicamento',
        'histquirurgico',
        'id_Paciente', // Asegúrate de tener esta columna si es la llave foránea
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_Paciente');
    }
}
