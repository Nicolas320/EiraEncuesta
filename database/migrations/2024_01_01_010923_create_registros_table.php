<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('nombres_apellidos');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('genero');
            $table->date('fecha_atencion');
            $table->string('municipio_atencion');
            $table->string('modalidad_atencion');
            $table->string('tiene_alguna_discapacidad');
            $table->string('tipo_discapacidad');
            $table->string('servicio_atendido');
            $table->string('otro');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datos_personales');
    }
}
