<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    use HasFactory;

    protected $fillable = [
        'prueba',
        'cant_preguntas',
        'description',
        'fecha_creacion'
    ];

    public $timestamps = true;
    protected $table = 'prueba';
}
