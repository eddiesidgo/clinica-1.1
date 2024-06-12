<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $fillable = [
        'DUI',
        'nombre',
        'genero',
        'direccion',
        'telefono',
        'correo_electronico',
    ];

    public function expedientes()
    {
        return $this->hasMany(Expediente::class, 'id_Paciente');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'id_Cita', 'id');
    }

    
}