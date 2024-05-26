<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expedientes';
    protected $primaryKey = 'idExp';
    protected $fillable = [
        'id_Paciente',
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

