<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    protected $table ="pipeline";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa', 'pais','ciudad','cliente','codigo_licitacion','nombre_proyecto','industria','sub_industria','estado','valor_oferta_scmi','probabilidad_ejecucion','probabilidad_ganar','probabilidad_ejecutar','binario_pesimista','binario_esperado','binario_optimista','plazo_ejecucion','fecha_inicio','fecha_terminacion','ingenieria','hh_ingenieria','procura','construccion','comisionado_pm','operacion_mantenimiento','tipo_contrato','descripcion_alcance','fecha_identificacion_opportunidad','fecha_invitacion','fecha_visita','visita_obligatoria','fecha_preguntas','fecha_respuestas','fecha_entrega_oferta','fecha_negociacion','fecha_adjudicacion','actividades','competencia','adjudicatario','valor_adjudicacion','forma_pago','codigo_interno','proposal_mgr_asignado'
    ];
}
