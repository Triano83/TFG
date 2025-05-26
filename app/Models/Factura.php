<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero_factura',
        'nombre_clinica',
        'direccion_clinica',
        'NIF_clinica',
        'email_clinica',
        'telefono_clinica',
        'nombre_cliente',
        'dato_empresa',
        'dato_nombre',
        'dato_apellidos',
        'dato_direccion',
        'dato_telefono',
        'dato_email',
        'dato_DNI',
        'fecha_emision',
        'subtotal',
        'total',
        'productos'
    ];
}
