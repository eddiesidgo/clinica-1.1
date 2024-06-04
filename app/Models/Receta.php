<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'Paciente',
        'DUI',
        'correo_electronico',
        'Receta',
        'codigo',
        'firma',
    ];

    public static function generateCodigo()
    {
        //strtoupper es una función para convertir una cadena de caracteres en mayusculas
        return strtoupper(uniqid());
    }
     //Función para generar la firma
    public static function generateFirma()
    {
        //strtoupper es una función para convertir una cadena de caracteres en mayusculas
        return strtoupper(uniqid());
    }
}
