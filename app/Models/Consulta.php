<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta';
    protected $primaryKey = 'idConsulta';

    protected $fillable = [
        'id_Cita',
        'diagnostico',
        'estado'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_Cita');
    }
}
