<Grid>
    <Body>
    <B>
        @foreach ($oportunidades as $o)
            <I id="{{ $o->id}}"
               codigo ="{{$o->id}}"
               empresa ="{{$o->empresa}}"
               pais ="{{$o->pais}}"
               ciudad ="{{$o->ciudad}}"
               cliente ="{{$o->cliente}}"
               ciudad ="{{$o->ciudad}}"
               codigo_licitacion ="{{$o->codigo_licitacion}}"
               nombre_proyecto ="{{$o->nombre_proyecto}}"
               industria ="{{$o->industria}}"
               sub_industria ="{{$o->sub_industria}}"
               estado ="{{$o->estado}}"
               valor_oferta_scmi ="{{$o->valor_oferta_scmi}}"
               probabilidad_ejecucion ="{{$o->probabilidad_ejecucion}}"
               probabilidad_ganar ="{{$o->probabilidad_ganar}}"
               probabilidad_ejecutar ="{{$o->probabilidad_ejecutar}}"
               binario_pesimista ="{{$o->binario_pesimista}}"
               binario_esperado ="{{$o->binario_esperado}}"
               binario_optimista ="{{$o->binario_optimista}}"
               plazo_ejecucion ="{{$o->plazo_ejecucion}}"
               fecha_inicio ="{{$o->fecha_inicio}}"
               fecha_terminacion ="{{$o->fecha_terminacion}}"
               ingenieria ="{{$o->ingenieria}}"
               hh_ingenieria ="{{$o->hh_ingenieria}}"
               procura ="{{$o->procura}}"
               construccion ="{{$o->construccion}}"
               comisionado_pm ="{{$o->comisionado_pm}}"
               operacion_mantenimiento ="{{$o->operacion_mantenimiento}}"
               tipo_contrato ="{{$o->tipo_contrato}}"
               descripcion_alcance ="{{$o->descripcion_alcance}}"
               fecha_identificacion_opportunidad ="{{$o->fecha_identificacion_opportunidad}}"
               fecha_invitacion ="{{$o->fecha_invitacion}}"
               fecha_visita ="{{$o->fecha_visita}}"
               visita_obligatoria ="{{$o->visita_obligatoria}}"
               fecha_preguntas ="{{$o->fecha_preguntas}}"
               fecha_respuestas ="{{$o->fecha_respuestas}}"
               fecha_entrega_oferta ="{{$o->fecha_entrega_oferta}}"
               fecha_negociacion ="{{$o->fecha_negociacion}}"
               fecha_adjudicacion ="{{$o->fecha_adjudicacion}}"
               actividades ="{{$o->actividades}}"
               competencia ="{{$o->competencia}}"
               adjudicatario ="{{$o->adjudicatario}}"
               valor_adjudicacion ="{{$o->valor_adjudicacion}}"
               forma_pago ="{{$o->forma_pago}}"
               codigo_interno ="{{$o->codigo_interno}}"
               proposal_mgr_asignado ="{{$o->proposal_mgr_asignado}}"
               fecha_creacion ="{{$o->created_at}}"
               fecha_actualizacion ="{{$o->updated_at}}"
               presupuesto_referencial ="{{$o->presupuesto_referencial}}"
               empresa_socia ="{{$o->empresa_socia}}"
               porcentaje_participacion ="{{$o->porcentaje_participacion}}"
            />
        @endforeach
    </B>
    </Body>
</Grid>