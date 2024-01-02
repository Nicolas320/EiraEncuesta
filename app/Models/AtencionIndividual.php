<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtencionIndividual extends Model
{
    protected $table = 'atencion_individual'; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trato_personal',
        'tiempo_espera',
        'privacidad_info',
        'experiencia_salud',
        'recomendacion',
        'comentarios'
    ];}
