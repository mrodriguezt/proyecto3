<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetidoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competidores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('nombre');
            $table->string('accionistas');
            $table->string('personal_clave');
            $table->string('industria');
            $table->string('sub_industria');
            $table->boolean('ingenieria');
            $table->boolean('procura');
            $table->boolean('construccion');
            $table->boolean('civil');
            $table->boolean('mecanico');
            $table->boolean('electrico');
            $table->boolean('i_c');
            $table->boolean('com_pm');
            $table->boolean('o_m');
            $table->boolean('fabricacion');
            $table->string('tipo_fabricacion');
            $table->string('representaciones');
            $table->float('ventas_anuales');
            $table->float('utilidad_anuales');
            $table->integer('anio');
            $table->string('paises_presencia');
            $table->string('pagina_web');
            $table->string('datos_adjuntos');
            $table->string('proyectos_adjuntos');
            $table->string('eeff');
            $table->string('asociaciones');
            $table->string('novedades');
            $table->string('noticias_publicas');
            $table->string('certificaciones');
            $table->string('ex_colaboradores');
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
        Schema::dropIfExists('competidores');
    }
}
