<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;
    protected $table = 'atencion_individual';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function registro()
    {
        return $this->belongsTo(Registro::class, 'registro_id');
    }
}
