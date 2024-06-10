<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $table = 'pacientes';
    protected $fillable = [
        'id'.
        'DUI',
        'nombre',
        'genero',
        'direccion',
        'telefono',
        'correo_electronico',
        'timestamps'
    ];
}