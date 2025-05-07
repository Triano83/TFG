<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $fillable = [
        'empresa',
        'nombre',
        'apellidos',
        'direccion',
        'telefono',
        'email',
        'DNI'
    ];

}
