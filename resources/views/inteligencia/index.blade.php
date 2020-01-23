@extends('template.main')
@section('title','COMERCIAL')
@section('content')
    <br>
    <h4><span class="badge badge-secondary">INTELIGENCIA</span></h4><br>
    <div  id="dataGrid" style="width:100%;height:3000px;"></div>
    <div class="modal" id="myModalImage">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Subir Imagen</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="custom-file">
                        {!! Form::open(['route'=>'subirFotoInteligencia','method'=>'POST','id'=>'formulario','name'=>'formulario','files'=>true])  !!}
                        <input type="hidden" id="codigo" value="0">
                        <input type="file" id="file" name="file" />
                        <hr>
                        <div align="center">
                        {!! Form::submit('Subir Archivo',['class'=>'btn btn-primary']) !!}<br>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModalDocs">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Subir Documento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        <b> Nota:</b>Para subir varios documentos deben estar comprimidos en un archivo .zip

                    </div>
                    <hr>
                    <div class="custom-file">
                        {!! Form::open(['route'=>'subirDocsInteligencia','method'=>'POST','id'=>'formularioDocs','name'=>'formularioDocs','files'=>true])  !!}
                        <input type="hidden" id="codigoDocs" value="0">
                        <input type="file" id="file" name="file" />
                        <br>
                        <div align="center">
                            <hr>
                        {!! Form::submit('Subir Archivo',['class'=>'btn btn-primary']) !!}<br>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>

        DisposeGrids();
        TreeGrid({Layout:{Url:"layoutInteligencia"},Data:{Url:"dataInteligencia/"},Upload:{Url:"saveInteligencia/",Attrs:"codigo"},Debug:0},"dataGrid");
        vId =0;
        function agregarFoto(id) {
            $("#codigo").val(id);
            $('#myModalImage').modal();
        }
      function subir_documentos(id) {
            $("#codigoDocs").val(id);
            $('#myModalDocs').modal();
        }

        Grids.OnRowAdded = function(G,row,paste) {
             G.SetValue(row, "imagen","",1);
             G.SetValue(row, "subir_documentos","",1);
             G.SetValue(row, "bajar_documentos","",1);
        }
        Grids.OnAfterSave = function(G)
        {
            G.Reload();
        }
        $(document).ready(function (e) {
            $("#formulario").on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("codigo",  $("#codigo").val());
                $.ajax({
                    url: '{{URL::route("subirFotoInteligencia")}}',
                    type: "POST",
                    data:  formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function()
                    {
                        //$("#preview").fadeOut();
                       //
                    },
                    success: function(data)
                    {
                       alert("Se ha guardado correctamente la Imagen");
                        $('#myModalImage').modal("hide");
                    },
                    error: function(e)
                    {
                        alert("Hubo un error al guardar. Los archivos permitidos son .jpg/.png");
                    }
                });
            }));
            $("#formularioDocs").on('submit',(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("codigoDocs", $("#codigoDocs").val());
                $.ajax({
                    url: '{{URL::route("subirDocsInteligencia")}}',
                    type: "POST",
                    data:  formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend : function()
                    {
                        //$("#preview").fadeOut();
                       //
                    },
                    success: function(data)
                    {
                       alert("Se ha guardado correctamente el archivo");
                        $('#myModalDocs').modal("hide");
                    },
                    error: function(e)
                    {
                        alert("Hubo un error al guardar");
                    }
                });
            }));
        });

    </script>
@endsection