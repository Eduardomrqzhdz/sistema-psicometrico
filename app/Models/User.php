<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'rol',
        'id_sexo',
        'fecha_nacimiento',
        'id_oficio',
        'id_carrera',
        'id_region'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //Para recuperar los valores de..
    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'id_sexo');
    }
    public function oficio()
    {
        return $this->belongsTo(oficio::class, 'id_oficio');
    }


    public function carrera()
    {
        return $this->belongsTo(carrera::class, 'id_carrera');
    }

    public function region()
    {
        return $this->belongsTo(region::class, 'id_region');
    }
}
