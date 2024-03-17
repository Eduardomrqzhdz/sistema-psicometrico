<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultados extends Model
{
    use HasFactory;

    protected $table = 'resultados';
    protected $fillable = [
        'puntaje_total',
        'resuelto',
        'id_usuario',
        'id_prueba',
        'fecha_resulto',
        'puntajeDirecto',
        'puntajeIndirecto'

    ];

    public $timestamps = true;
}
