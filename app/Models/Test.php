<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $table = 'respuestas';
    protected $fillable = [
        'id_prueba',
        'id_pregunta',
        'puntaje',
    ];

    public $timestamps = true;
}
