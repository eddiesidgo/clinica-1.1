<?php

namespace App\Models;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = 
    [
    'id',
    'DUI',
    'nombre',
    'event', 
    'start_date', 
    'end_date'
    ];
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'DUI');//esto para que sea la relacion uno a uno
    }
}
