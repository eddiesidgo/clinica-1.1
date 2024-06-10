<?php

namespace App\Models;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'DUI',
        'nombre',
        'antecedentes',
        'alergias',
        'medicamento',
        'histquirurgico'
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_Paciente');//esto para que sea la relacion uno a uno
    }
}

