<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    protected $table = 'atencion_individual';


    protected $fillable = [
        'trato_personal',
        'tiempo_espera',
        'privacidad_info',
        'experiencia_salud',
        'recomendacion',
        'comentarios'
    ];
}


