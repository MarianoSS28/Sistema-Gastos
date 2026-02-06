<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'MetodosPago';
    protected $primaryKey = 'idMetodoPago';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'tipo',
        'estado',
        'observacion',
        'usuario_creacion',
        'fecha_creacion',
        'usuario_modificacion',
        'fecha_modificacion'
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
        'fecha_modificacion' => 'datetime',
    ];
}