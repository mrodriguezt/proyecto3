<Grid>
    <Body>
    <B>
        @foreach ($clientes as $c)
            <I id="{{ $c->id}}"
               codigo ="{{$c->id}}"
               nombre ="{{$c->nombre}}"
               ruc ="{{$c->ruc}}"
               telefono ="{{$c->telefono}}"
               correo ="{{$c->correo}}"
               contacto ="{{$c->contacto}}"
               observaciones ="{{$c->observaciones}}"
            />
        @endforeach
    </B>
    </Body>
</Grid>