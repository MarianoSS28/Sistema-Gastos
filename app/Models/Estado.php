<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'Estados';
    protected $primaryKey = 'idEstado';
    public $timestamps = false;

    protected $fillable = [
        'tabla',
        'nombre',
        'descripcion',
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