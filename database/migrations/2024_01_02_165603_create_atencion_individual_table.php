<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('atencion_individual', function (Blueprint $table) {
            $table->id();
            $table->string('trato_personal', 255);
            $table->string('tiempo_espera', 255);
            $table->string('privacidad_info', 255);
            $table->string('experiencia_salud', 255);
            $table->string('resultados_atencion', 255);
            $table->string('recomendacion', 255);
            $table->string('comentarios', 255);
            $table->unsignedBigInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros')
            ->onDelete('cascade')
            ->onDelete('cascade');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('atencion_individual');
    }
};
