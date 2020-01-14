@extends('template.main')
@section('title','COMERCIAL')
@section('content')
    <br>
    <h4><span class="badge badge-secondary">PIPELINE</span></h4><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Crear Nuevo Cliente
    </button>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="90%"> <div  id="dataGrid" style="width:100%;height:800px;"></div></td>
        </tr>
        </tbody>
    </table>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Crear Nuevo Cliente</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                {!! Form::text('ruc', null,['class'=>'form-control','placeholder' => 'RUC','id'=>'ruc']); !!}
                            </div>
                            <div class="col">
                                {!! Form::text('nombreCliente', null,['class'=>'form-control','placeholder' => 'Nombre','id'=>'nombreCliente']); !!}
                            </div>
                            <div class="col">
                                {!! Form::text('telefonoCliente', null,['class'=>'form-control','placeholder' => 'Telefono','id'=>'telefonoCliente']); !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                {!! Form::text('correoCliente', null,['class'=>'form-control','placeholder' => 'Correo','id'=>'correoCliente']); !!}
                            </div>
                            <div class="col">
                                {!! Form::text('contactoCliente', null,['class'=>'form-control','placeholder' => 'Contacto','id'=>'contactoCliente']); !!}
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal" onclick="guardarCliente()">Guardar Cliente</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        DisposeGrids();
        TreeGrid({Layout:{Url:"layoutPipeline"},Data:{Url:"dataPipeline/"},Upload:{Url:"savePipeline/"},Debug:0},"dataGrid");
        R = null;
        Grids.OnAfterValueChanged = function(G,row,col) {

            if (col == "cliente") {
                R=row;
                cliente = G.GetString(row, "cliente");
                codigo = G.GetString(row, "codigo");
                if(cliente=="Nuevo Cliente"){
                    $('#myModal').modal();
                }
            }
        }
        function guardarCliente() {
            $.ajax({
                type: "POST",
                url: '{{URL::route("crearCliente")}}',
                data: {ruc:  $("#ruc").val(),
                    nombreCliente:  $("#nombreCliente").val(),
                    telefonoCliente:  $("#telefonoCliente").val(),
                    correoCliente:  $("#correoCliente").val(),
                    contactoCliente:  $("#contactoCliente").val(),
                    "_token": "{{ csrf_token() }}",},
                success: function( msg ) {
                    if(msg=="ERROR"){
                        alert("El cliente no puede ser guardado")
                    }else{
                        for (var i = 0; i < Grids.length; i++) {
                            var Gr = Grids[i];
                            if (Gr) {
                                if (Gr.id == "pipeline"){
                                    alert(R)
                                    G.SetValue(R, "cliente",1, 1);
                                    G.RefreshCell (R, "cliente");
                                    alert(R)
                                }
                            }
                        }
                        R = null;
                    }
                }
            });
        }
    </script>
@endsection