<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    protected $table = 'atencion_individual';


    // protected $fillable = [
    //     'trato_personal',
    //     'tiempo_espera',
    //     'privacidad_info',
    //     'experiencia_salud',
    //     'resultados_atencion',
    //     'recomendacion',
    //     'comentarios',
    //     'registro_id'
    // ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id');
    }
}
