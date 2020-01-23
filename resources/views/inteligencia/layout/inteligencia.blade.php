<Grid>
    <Cfg id='inteligencia' Style="{{ env('STYLEGRID') }}" Code='PTAEXXOQBFRYSC'  MaxHeight='1' MinTagHeight="400" ShowDeleted="1"
         Deleting="0" DateStrings='1' Selecting='0' Sort='codigo'
         AppendId='1' FullId='1' IdChars='0123456789'  NumberId='1' LastId='1' CaseSensitiveId='1'/>
    <LeftCols>
        <C Name='codigo' Width='80' Type='Int' CanEdit="0" />
        <C Name='fecha' Width='110' Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
        <C Name='nombre_tercero' Width='150' Type='Text' CanEdit="1"/>
    </LeftCols>
    <Cols>
        <C Name='tipo_contacto' Width='150' Type='Enum' Enum="|Cliente|Socio|Dueño|Agente|Proveedor|Otro" CanEdit="1"/>
        <C Name='publico' Width='150' Type='Bool' CanEdit="1"/>
        <C Name='privado' Width='150' Type='Bool' CanEdit="1"/>
        <C Name='formato_contacto' Width='250' Type='Text'  CanEdit="1"/>
        <C Name='contactos_clave' Width='200' Type='Line' CanEdit="1"/>
        <C Name='imagen' Width='150' Type='Img' CanEdit="0"/>
        <C Name='asistentes' Width='150' Type='Text' CanEdit="1"/>
        <C Name='involucrados_scmi' Width='150' Type='Lines' CanEdit="1"/>
        <C Name='proposito' Width='150' Type='Lines' CanEdit="1"/>
        <C Name='proposito_otro' Width='150' Type='Lines' CanEdit="1"/>
        <C Name='pais' Width='120' Type='Enum' Enum='|{{$nPaises}}' EnumKeys='|{{$cPaises}}'CanEdit="1"/>
        <C Name='ciudad' Width='150' Type='Text' CanEdit="1"/>
        <C Name='industria' Width='120' Type='Enum'  Enum='|Generacion|O&G|Mineral|Industrial|Otro'  Clear='sub_industria' CanEdit="1"/>
        <C Name='sub_industria' Width='120' Type='Enum' Related='industria' EnumGeneracion='|CS|CG|CC|Renovable|Distribucion' EnumO&G='|Upstream|Downstream|Terminal' EnumMineral='|Au|Ag|Cu|Otro'  EnumIndustrial='|Alimentos|Cemento|Otros' CanEdit="1"/>
        <C Name='pais_interes' Width='150' Type='Text' CanEdit="1"/>
        <C Name='detalle_contacto' Width='150' Type='Text' CanEdit="1"/>
        <C Name='subir_documentos' Width='150' Type='Link' CanEdit="0" Align="Center"/>
        <C Name='bajar_documentos' Width='150' Type='Link' CanEdit="0" Align="Center"/>
        <C Name='requiere_seguimiento' Width='150' Type='Bool' CanEdit="1"/>
        <C Name='fecha_seguimiento' Width='150'  Type='Date' CanEdit="1" Format="yyyy-mm-dd"/>
    </Cols>
    <Header  Wrap="1" codigo="Codigo" fecha="Fecha" nombre_tercero="Nombre Tercero" tipo_contacto="Tipo Contacto"
             publico="Publico" privado="Privado" formato_contacto="Formato Contacto" contactos_clave="Contactos Clave"
             imagen="Foto" asistentes="Asistentes" involucrados_scmi="Involucrados SCMI" proposito="Proposito" proposito_otro="Proposito Otro"
             pais="Pais" ciudad="Ciudad"   industria="Industria"    sub_industria="Sub Industria"     pais_interes="Pais Interes"
             detalle_contacto="Detalle Contacto" documentos="Documentos" requiere_seguimiento="Requiere Seguimiento"
             fecha_seguimiento="Fecha Seguimiento" subir_documentos="Subir Documentos" bajar_documentos="Bajar Documentos"
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