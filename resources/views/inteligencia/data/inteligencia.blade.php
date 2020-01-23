<Grid>
    <Body>
        <B>
            @foreach ($inteligencias as $i)
                <I id="{{ $i->id}}"
                   codigo ="{{$i->id}}"
                   @if ($i->fecha!='1970-01-01')
                   fecha ="{{$i->fecha}}"
                   @endif
                   nombre_tercero ="{{$i->nombre_tercero}}"
                   tipo_contacto ="{{$i->tipo_contacto}}"
                   publico ="{{$i->publico}}"
                   privado ="{{$i->privado}}"
                   formato_contacto ="{{$i->formato_contacto}}"
                   contactos_clave ="{{$i->contactos_clave}}"
                   @if ($i->foto_nombre!="")
                        imagen  ="|{{ asset("images/inteligencia/images/".$i->foto_nombre)}}|200|200|0|200|javascript:agregarFoto('{{$i->id}}')|_self"
                   @else
                        imagen  ="|{{ asset("images/inteligencia/default.png")}}|200|200|200|200|javascript:agregarFoto('{{$i->id}}')|_self"
                   @endif
                   asistentes ="{{$i->asistentes}}"
                   involucrados_scmi ="{{$i->involucrados_scmi}}"
                   proposito ="{{$i->proposito}}"
                   proposito_otro ="{{$i->proposito_otro}}"
                   pais ="{{$i->pais}}"
                   ciudad ="{{$i->ciudad}}"
                   industria ="{{$i->industria}}"
                   sub_industria ="{{$i->sub_industria}}"
                   pais_interes ="{{$i->pais_interes}}"
                   detalle_contacto ="{{$i->detalle_contacto}}"
                   documentos ="{{$i->documentos}}"
                   requiere_seguimiento ="{{$i->requiere_seguimiento}}"
                   subir_documentos  ="|javascript:subir_documentos('{{$i->id}}')|Subir Documentos|_self"
                   @if ($i->documentos)
                        bajar_documentos  ="|{{ asset("images/inteligencia/documentos/".$i->documentos)}}|{{$i->documentos}}|_self"
                   @else
                        bajar_documentosType="Text"
                        bajar_documentos  ="No Existen Archivos Cargados"
                   @endif


                   @if ($i->fecha_seguimiento!='1970-01-01')
                            fecha_seguimiento ="{{$i->fecha_seguimiento}}"
                   @endif
                />
            @endforeach
        </B>
    </Body>
</Grid>