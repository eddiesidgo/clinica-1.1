<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta';
    protected $primaryKey = 'idConsulta';
    public $timestamps = false;

    protected $fillable = [
        'id_Cita',
        'diagnostico',
        'estado'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_Cita', 'id');
    }


    // Mutator para establecer el campo 'updated_at' automáticamente al crear un nuevo registro
    public function setUpdatedAtAttribute($value)
    {
        // No hagas nada, esto evitará que Laravel intente establecer 'updated_at'
    }
}
