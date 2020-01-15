<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_proyecto');
            $table->string('cliente');
            $table->string('contacto_cliente');
            $table->string('propietario');
            $table->string('contacto_propietario');
            $table->float('monto_contrato');
            $table->date('fecha_inicio');
            $table->date('fecha_terminacion');
            $table->integer('plazo');
            $table->string('pais');
            $table->string('ciudad');
            $table->integer('potencia_mw');
            $table->string('industria');
            $table->string('sub_industria');
            $table->string('combustible');
            $table->string('tecnologia');
            $table->string('marca');
            $table->string('serie');
            $table->boolean('ingenieria_basica');
            $table->boolean('ingenieria_detalle');
            $table->boolean('procura_bop');
            $table->boolean('procura_main');
            $table->boolean('construccion_civil');
            $table->string('cantidades_civiles');
            $table->float('hh_civiles');
            $table->boolean('montaje_mecanico');
            $table->string('cantidades_mecanicas');
            $table->float('hh_mecanicas');
            $table->boolean('montaje_electrico');
            $table->float('cantidades_electricas');
            $table->float('hh_electricas');
            $table->boolean('montaje_ic');
            $table->float('cantidades_ic');
            $table->float('hh_ic');
            $table->boolean('comisionado_pm');
            $table->text('detalle_alcance_com_pm');
            $table->boolean('operacion_mantenimiento');
            $table->text('detalle_om');
            $table->boolean('existe_socio');
            $table->string('socio');
            $table->string('respaldos_contrato');
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
        Schema::dropIfExists('experiencia');
    }
}
