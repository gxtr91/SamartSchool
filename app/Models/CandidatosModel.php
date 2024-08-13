<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatosModel extends Model
{
    use HasFactory;
    protected $table = 'candidatos'; // Use a custom table name

    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombres',
        'apellidos',
        'nombres_apellidos',
        'genero',
        'fecha_entrevista',
        'duracion',
        'estado',
        'ciudad',
        'ciudad_estado',
        'titulo_estudio',
        'ValoracionIngles',
        'ValoracionExcel',
        'ValoracionBasesDeDatos',
        'ValoracionTrabajoEquipo',
        'PromedioValoracion',
        'status'

];
}