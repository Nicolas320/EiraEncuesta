<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';


    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombres_apellidos',
        'telefono',
        'direccion',
        'genero',
        'fecha_atencion',
        'municipio_atencion',
        'modalidad_atencion',
        'tiene_alguna_discapacidad',
        'tipo_discapacidad',
        'servicio_atendido',
        'otro'
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function atencion()
    {
        return $this->hasMany(Atencion::class, 'registro_id', 'id');
    }
}



