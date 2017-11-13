@extends('layouts.admin')
@section('external_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}"/>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Projetos</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>    
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Projetos</a></li>
    </ol>
    <br>
    <a href="{{route('projeto.create')}}" class="btn btn-primary btn-small">Adicionar Novo Projeto</a>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Todas os Projetos</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cliente</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projetos as $p)
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nome }}</td>
                                    <td>{{ $p->cliente->nome }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('external_js')
<!-- DataTables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(function (){
        $('#example1').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    });
</script>
@endsection