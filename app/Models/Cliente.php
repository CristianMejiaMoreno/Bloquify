<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable =[
        'nombre',
        'apellido',
        'tipoDocumentoId',
        'numeroDocumento',
        'telefono',
        'direccion'
    ];

    public function tipoDocumento(){
        return $this->belongsTo(TipoDocumento::class);
    }
}
