<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'imei',
        'marca',
        'modelo',
        'numero_serie',
        'estado_condicion',
        'estado_uso',
        'foto_url',
        'observaciones'
    ];
}
