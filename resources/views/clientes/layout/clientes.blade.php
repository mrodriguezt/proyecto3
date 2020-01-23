<Grid>
    <Cfg id='inteligencia' Style="{{ env('STYLEGRID') }}" Code='PTAEXXOQBFRYSC'  MaxHeight='1' MinTagHeight="400" ShowDeleted="1"
         Deleting="0" DateStrings='1' Selecting='0' Sort='codigo'
         AppendId='1' FullId='1' IdChars='0123456789'  NumberId='1' LastId='1' CaseSensitiveId='1'/>
    <LeftCols>
        <C Name='codigo' Width='80' Type='Int' CanEdit="0" />
        <C Name='nombre' Width='150' Type='Text' CanEdit="1"/>
    </LeftCols>
    <Cols>
        <C Name='ruc' Width='110' Type='Text' CanEdit="1"/>
        <C Name='telefono' Width='110' Type='Text' CanEdit="1"/>
        <C Name='correo' Width='110' Type='Text' CanEdit="1"/>
        <C Name='contacto' Width='150' Type='Text' CanEdit="1"/>
        <C Name='observaciones' Width='200' Type='Text' CanEdit="1"/>
    </Cols>
    <Header  Wrap="1" codigo="Codigo" nombre="Nombre" ruc="RUC" telefono="Telefono" correo="Correo" contacto="Contacto"
             observaciones="Observaciones" status="Status"
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