<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficio extends Model
{

    protected $table = 'oficio';
    protected $fillable = [
        'id',
        'oficio',
    ];
    use HasFactory;
}
