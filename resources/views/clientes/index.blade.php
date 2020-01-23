@extends('template.main')
@section('title','COMERCIAL')
@section('content')
    <br>
    <h4><span class="badge badge-secondary">CLIENTES</span></h4><br>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td width="90%"> <div  id="dataGrid" style="width:100%;height:1000px;"></div></td>
        </tr>
        </tbody>
    </table>
@endsection
@section('js')
    <script>
        DisposeGrids();
        TreeGrid({Layout:{Url:"layoutClientes"},Data:{Url:"dataClientes/"},Upload:{Url:"saveClientes/",Attrs:"codigo"},Debug:0},"dataGrid");
    </script>
@endsection