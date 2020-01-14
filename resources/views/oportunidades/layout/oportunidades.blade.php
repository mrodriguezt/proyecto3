<Grid>
    <Cfg id='pipeline' Style="{{ env('STYLEGRID') }}" Code='PTAEXXOQBFRYSC'  MaxHeight='1' MinTagHeight="400" ShowDeleted="1"
         Deleting="0" DateStrings='1' Selecting='0' Sort='codigo'
         AppendId='1' FullId='1' IdChars='0123456789'  NumberId='1' LastId='1' CaseSensitiveId='1'/>
    <LeftCols>
        <C Name='codigo' Width='50' Type='Int' CanEdit="0" />
        <C Name='empresa' Width='150' Type='Enum' Enum='|SCMI|GENESYS|IAA' CanEdit="1" />
        <C Name='cliente' Width='120' Type='Enum' Enum='|Nuevo Cliente|{{$nClientes}}' EnumKeys='|ADD|{{$cClientes}}' CanEdit="1"/>
    </LeftCols>
    <Cols>
        <C Name='empresa_socia' Width='150' Type='Enum' Enum='|SCMI|GENESYS|IAA' CanEdit="1" />
        <C Name='porcentaje_participacion' Width='100' Type='Float' CanEdit="1"/>
        <C Name='pais' Width='120' Type='Enum' Enum='|{{$nPaises}}' EnumKeys='|{{$cPaises}}'CanEdit="1"/>
        <C Name='ciudad' Width='120' Type='Text' CanEdit="1"/>
        <C Name='codigo_licitacion' Width='120' Type='Text' CanEdit="1"/>
        <C Name='nombre_proyecto' Width='120' Type='Text' CanEdit="1"/>
        <C Name='industria' Width='120' Type='Enum'  Enum='|Generacion|O&G|Mineral|Industrial|Otro'  Clear='sub_industria' CanEdit="1"/>
        <C Name='sub_industria' Width='120' Type='Enum' Related='industria' EnumGeneracion='|CS|CG|CC|Renovable|Distribucion' EnumO&G='|Upstream|Downstream|Terminal' EnumMineral='|Au|Ag|Cu|Otro'  EnumIndustrial='|Alimentos|Cemento|Otros' CanEdit="1"/>
        <C Name='estado' Width='120' Type='Enum' Enum="|Oportunidad Identificada|Referencial|RFQ Recibido|Descartada|Preparacion|Ofertada|Perdida|Adjudicada|Desierta|Cancelada|Otro" CanEdit="1"/>
        <C Name='valor_oferta_scmi' Width='120' Type='Float' CanEdit="1" Format="c"/>
        <C Name='probabilidad_ejecucion' Width='120' Type='Float' CanEdit="1"/>
        <C Name='probabilidad_ganar' Width='120' Type='Float' CanEdit="1"/>
        <C Name='probabilidad_ejecutar' Width='120' Type='Float' CanEdit="1"/>
        <C Name='binario_pesimista' Width='110' Type='Bool' CanEdit="1"/>
        <C Name='binario_esperado' Width='110' Type='Bool' CanEdit="1"/>
        <C Name='binario_optimista' Width='110' Type='Bool' CanEdit="1"/>
        <C Name='plazo_ejecucion' Width='110' Type='Float' CanEdit="1"/>
        <C Name='fecha_inicio' Width='110' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_terminacion' Width='110' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='ingenieria' Width='100' Type='Bool' CanEdit="1"/>
        <C Name='hh_ingenieria' Width='100' Type='Float' CanEdit="1"/>
        <C Name='procura' Width='120' Type='Bool' CanEdit="1"/>
        <C Name='construccion' Width='120' Type='Bool' CanEdit="1"/>
        <C Name='comisionado_pm' Width='120' Type='Bool' CanEdit="1"/>
        <C Name='operacion_mantenimiento' Width='125' Type='Bool' CanEdit="1"/>
        <C Name='tipo_contrato' Width='120' Type='Enum' Enum="|Lump Sum|Administacion + Fee|Precios Unitarios|Otros" CanEdit="1"/>
        <C Name='descripcion_alcance' Width='300' Type='Lines' CanEdit="1"/>
        <C Name='fecha_identificacion_opportunidad' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_invitacion' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_visita' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='visita_obligatoria' Width='120' Type='Bool' CanEdit="1"/>
        <C Name='fecha_preguntas' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_respuestas' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_entrega_oferta' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_negociacion' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='fecha_adjudicacion' Width='120' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='actividades' Width='300' Type='Lines' CanEdit="1"/>
        <C Name='competencia' Width='200' Type='Lines' CanEdit="1"/>
        <C Name='adjudicatario' Width='120' Type='Lines' CanEdit="1"/>
        <C Name='presupuesto_referencial' Width='120' Type='Float' CanEdit="1"  Format="c"/>
        <C Name='valor_adjudicacion' Width='120' Type='Float' CanEdit="1" Format="c"/>
        <C Name='forma_pago' Width='120' Type='Text' CanEdit="1"/>
        <C Name='codigo_interno' Width='120' Type='Text' CanEdit="1"/>
        <C Name='proposal_mgr_asignado' Width='120' Type='Text' CanEdit="1"/>
        <C Name='fecha_creacion' Width='120' Type='Date' CanEdit="0" Format="yyyy-mm-dd"/>
        <C Name='fecha_actualizacion' Width='120' Type='Date' CanEdit="0" Format="yyyy-mm-dd"/>
    </Cols>
    <Header  Wrap="1"
    empresa="Empresa"  pais="Pais" ciudad ="Ciudad" codigo="ID" cliente="Cliente" codigo_licitacion="Codigo de Licitación" nombre_proyecto="Nombre de Proyecto" industria="Industria"  sub_industria="Sub-Industria" estado="Estado"
             valor_oferta_scmi ="Valor Oferta SCMI"
             empresa_socia="Empresa Socia" porcentaje_participacion="Porcentaje Participacion"
             fecha_creacion="Fecha Creacion"
             fecha_actualizacion="Fecha Actualización"
             probabilidad_ejecucion ="Probabilidad de Ejecucion"
             probabilidad_ganar ="Probabilidad de Ganar"
             probabilidad_ejecutar ="Probabilidad SCMI Ejecutar"
             binario_pesimista ="Binario - pesimista"
             binario_esperado ="Binario - esperado"
             binario_optimista ="Binario - optimista"
             plazo_ejecucion ="Plazo de Ejecucion (meses)"
             fecha_inicio ="Fecha de Inicio"
             fecha_terminacion ="Fecha de terminacion"
             ingenieria ="Ingenieria"
             hh_ingenieria ="HH Ingenieria"
             procura ="Procura"
             construccion ="Construccion"
             comisionado_pm ="Comisionado & PM"
             operacion_mantenimiento ="Operación y Mantenimiento"
             tipo_contrato ="Tipo de Contrato"
             descripcion_alcance ="Descripcion de Alcance"
             fecha_identificacion_opportunidad ="Fecha Identificacion de Opportunidad"
             fecha_invitacion ="Fecha Invitacion"
             fecha_visita ="Fecha Visita"
             visita_obligatoria ="Visita Obligatoria"
             fecha_preguntas ="Fecha Preguntas"
             fecha_respuestas ="Fecha Respuestas"
             fecha_entrega_oferta ="Fecha Entrega Oferta"
             fecha_negociacion ="Fecha Negociacion"
             fecha_adjudicacion ="Fecha Adjudicacion"
             actividades ="Actividades"
             competencia ="Competencia"
             adjudicatario ="Adjudicatario"
             valor_adjudicacion ="Valor Adjudicacion"
             forma_pago ="Forma de Pago"
             codigo_interno ="Codigo Interno"
             proposal_mgr_asignado ="Proposal Mgr Asignado"
             presupuesto_referencial="Presupuesto Referencial"

    />
    <Head>
        <I Kind='Filter' empresa=''
           empresaButton='Defaults' empresaRange='1'
           empresaDefaults='|*RowsVariable|*FilterOff'
           pais=''
           paisButton='Defaults' paisRange='1'
           paisrDefaults='|*RowsVariable|*FilterOff'
        />
    </Head>

    <Toolbar id="toolbarDatos" Cells="Add,Export,Save,Reload,Formula"  />
</Grid>