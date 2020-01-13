@extends('template.main')
@section('title','OPERACIONES')
@section('content')
    <br>
    <h4><span class="badge badge-secondary">PIPELINE</span></h4><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Nuevo
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
                    <h4 class="modal-title">Crear Nuevo</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col">
                                {!! Form::select('empresa',['SCMI','IAA'],null,['class'=>'form-control select-rol','placeholder'=>'Seleccione la Empresa','required']) !!}
                            </div>
                            <div class="col">
                                {!! Form::text('cliente', null,['class'=>'form-control','placeholder' => 'Cliente']); !!}
                            </div>
                            <div class="col">
                                {!! Form::select('paises',$paises,null,['class'=>'form-control select-rol','placeholder'=>'Pais','required']) !!}
                            </div>
                            <div class="col">
                                {!! Form::text('ciudad', null,['class'=>'form-control','placeholder' => 'Ciudad']); !!}
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                {!! Form::text('ciudad', null,['class'=>'form-control','placeholder' => 'Codigo de Licitacion']); !!}
                            </div>
                            <div class="col">
                                {!! Form::text('ciudad', null,['class'=>'form-control','placeholder' => 'Nombre de Proyecto']); !!}
                            </div>
                            <div class="col">
                                {!! Form::select('industria',['Generacion','O&G','Mineral','Industrial','Otro'],null,['class'=>'form-control select-rol','placeholder'=>'Seleccione la Empresa','required']) !!}
                            </div>
                            <div class="col">
                                {!! Form::text('ciudad', null,['class'=>'form-control','placeholder' => 'Sub Industria']); !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">

                            <div class="col">
                                {!! Form::select('estado',['Oportunidad Identificada','Referencial','RFQ Recibido'],null,['class'=>'form-control select-rol','placeholder'=>'Seleccione la Empresa','required']) !!}
                            </div>
                            <div class="col">
                                {!! Form::number('valor_orferta_scmi', null,['class'=>'form-control','placeholder' => 'Valor de Oferta']); !!}
                            </div>
                            <div class="col">
                                {!! Form::number('probabilidad_ejecucion', null,['class'=>'form-control','placeholder' => 'Probabilida de Ejecución']); !!}
                            </div>
                            <div class="col">
                                {!! Form::number('probabilidad_ganar', null,['class'=>'form-control','placeholder' => 'Probabilidad de Ganar']); !!}
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        DisposeGrids();
        TreeGrid({Layout:{Url:"layoutPipeline"},Data:{Url:"dataPipeline/"},Upload:{Url:"savePipeline/"},Debug:0},"dataGrid");
    </script>
@endsection