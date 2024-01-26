<?php

namespace App\Models\Subdirectorio;

use Illuminate\Database\Eloquent\Model;

class FinEncuesta extends Model
{
    // Define tu modelo aquí
    protected $table = 'registros'; // Reemplaza 'nombre_de_la_tabla' con el nombre real de tu tabla

    protected $fillable = [
        'campo1',
        'campo2',
        // Agrega aquí los nombres de los campos que deseas asignar en masa
    ];

    // Si tienes campos de fecha, puedes especificar el formato en el que se almacenan en la base de datos
    protected $dateFormat = 'Y-m-d H:i:s';

    // Si tus campos de fecha no tienen el formato predeterminado de Laravel, puedes especificar el formato aquí
    protected $dates = [
        'created_at',
        'updated_at',
        // Agrega aquí otros campos de fecha si es necesario
    ];
}
