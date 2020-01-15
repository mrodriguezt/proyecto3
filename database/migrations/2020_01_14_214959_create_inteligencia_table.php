<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteligenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inteligencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('nombre_tercero');
            $table->string('tipo_contacto');
            $table->string('tipo');
            $table->string('formato_contacto');
            $table->string('contactos_clave');
            $table->string('foto');
            $table->string('asistentes');
            $table->string('involucrados_scmi');
            $table->string('proposito');
            $table->string('proposito-otro');
            $table->string('pais');
            $table->string('ciudad');
            $table->string('ubicacion');
            $table->string('industria');
            $table->string('sub_industria');
            $table->string('pais_interes');
            $table->string('detalle_contacto');
            $table->string('documentos');
            $table->boolean('requiere_seguimiento');
            $table->boolean('requerimiento_seguimiento');
            $table->date('fecha_seguimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inteligencia');
    }
}
