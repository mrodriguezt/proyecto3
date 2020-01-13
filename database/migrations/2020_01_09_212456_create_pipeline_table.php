<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePipelineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pipeline', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('empresa');
            $table->string('pais');
            $table->string('ciudad');
            $table->string('cliente');
            $table->string('codigo_licitacion');
            $table->string('nombre_proyecto');
            $table->string('industria');
            $table->string('sub_industria');
            $table->string('estado');
            $table->float('valor_oferta_scmi');
            $table->float('probabilidad_ejecucion');
            $table->float('probabilidad_ganar');
            $table->float('probabilidad_ejecutar');
            $table->integer('binario_pesimista');
            $table->integer('binario_esperado');
            $table->integer('binario_optimista');
            $table->float('plazo_ejecucion');
            $table->date('fecha_inicio');
            $table->date('fecha_terminacion');
            $table->integer('ingenieria');
            $table->float('hh_ingenieria');
            $table->integer('procura');
            $table->integer('construccion');
            $table->integer('comisionado_pm');
            $table->integer('operacion_mantenimiento');
            $table->string('tipo_contrato');
            $table->string('descripcion_alcance');
            $table->date('fecha_identificacion_opportunidad');
            $table->date('fecha_invitacion');
            $table->date('fecha_visita');
            $table->integer('visita_obligatoria');
            $table->date('fecha_preguntas');
            $table->date('fecha_respuestas');
            $table->date('fecha_entrega oferta');
            $table->date('fecha_negociacion');
            $table->date('fecha_adjudicacion');
            $table->string('actividades');
            $table->string('competencia');
            $table->string('adjudicatario');
            $table->float('valor_adjudicacion');
            $table->string('forma_pago');
            $table->string('codigo_interno');
            $table->string('proposal_mgr_asignado');
            $table->rememberToken();
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
        Schema::table('oportunidades', function (Blueprint $table) {
            //
        });
    }
}
