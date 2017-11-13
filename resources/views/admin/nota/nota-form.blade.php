@extends('layouts.admin')
@section('external_css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
<style>
    table{
        border: 1px solid gray !important; 
        border-collapse: collapse !important;
    }
    table, td{
        border: 1px solid gray !important; 
    }
    table, th{
        text-align: center;
        border: 2px solid gray !important; 
    }
</style>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Nova Nota</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>    
        <li><a href="{{route('nota.index')}}"><i class="fa fa-dashboard"></i> Notas</a></li>
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Novo</a></li>
    </ol>
</section>
<section class="content" data-ng-controller="NotaController as n">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe os dados abaixo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{route('nota.store')}}">
                    {{ csrf_field() }}
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="nome">Nº Nota de Debito</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Entre com o nº da Nota"/>
                        </div>
                        <div class="form-group">
                            <label for="empresa_id">Empresa</label>
                            <select id="empresa_id" name="empresa_id" class="form-control select2" style="width: 100%;">
                                @foreach($empresas as $e)
                                    <option value="{{$e->id}}">{{$e->nome}}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="form-group">
                            <label for="projeto_id">Projeto</label>
                            <select id="projeto_id" name="projeto_id" class="form-control select2" style="width: 100%;">
                                @foreach($projetos as $p)
                                    <option value="{{$p->id}}">{{$p->nome}} | Empresa: {{$p->cliente->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Quilometragem</h3>
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-quilometragem"><i class="fa fa-plus"></i> Adicionar</a>
                            </div>
                            <div class="box-body">
                                <table id="despesa_table" class="table table-bordered table-striped">
                                    <thead>           
                                        <tr>
                                            <th colspan="6">(*) Descrição dos Gastos com Quilometragem</th>
                                        </tr>                             
                                        <tr>
                                            <th>Data</th>
                                            <th>Origem</th>
                                            <th>Destino</th>                                
                                            <th>Qtd. de KM</th>
                                            <th>Valor por KM</th>
                                            <th>Total em R$</th>
                                        </tr>
                                    </thead>
                                    <tbody>                               
                                        <tr data-ng-repeat="q in n.quilometragens">
                                            <td><% q.quilometragem_data %></td>
                                            <td><% q.quilometragem_origem %></td>
                                            <td><% q.quilometragem_destino %></td>
                                            <td><% q.quilometragem_quantidade_km %></td>
                                            <td><% q.quilometragem_quantidade_km_valor | currency: "R$" %></td>
                                            <td><% q.quilometragem_quantidade_km_total | currency: "R$" %></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="border-right: none !important;"></td>
                                            <td style="border-left: none !important;border-right: none !important;"></td>
                                            <td style="border-left: none !important;border-right: none !important;"></td>
                                            <td style="border-left: none !important;border-right: none !important;"></td>
                                            <td style="border-left: none !important;border-right: none !important;"></td>                                            
                                            <td style="border-left: none !important;"><strong>Total: </strong><% n.totalKm | currency: "R$" %></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <input type="hidden" id="quilometragens_list" name="quilometragens"/>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Despesas</h3>
                                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-despesa"><i class="fa fa-plus"></i> Adicionar</a>
                            </div>
                            <div class="box-body">
                                <table id="despesa_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Despesa</th>
                                            <th>Valor</th>                                
                                        </tr>
                                    </thead>
                                    <tbody>                               
                                        <tr data-ng-repeat="d in n.despesas">
                                            <td/><% d.tipo_despesa_codigo%></td>
                                            <td><% d.valor_despesa | currency: "R$" %></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="border-right: none !important;"></td>
                                            <td style="border-left: none !important;"><strong>Total: </strong><% n.totalDp | currency: "R$" %></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <input type="hidden" id="despesas_list" name="despesas" />                        
                            </div>
                        </div>                        
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Adiantamento</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="adiantamento">Houve adiantamento ?</label>
                                    <select name="" id="adiantamento">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="adiantamento_valor">Valor do adiantamento</label>
                                    <input class="" type="number" name="adiantamento_valor" id="adiantamento_valor" data-ng-model="n.adiantamento_valor">
                                </div>
                            </div>
                        </div>                           
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="modal-despesa">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Despesa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tipodespesa_id">Despesa</label>
                            <select id="tipodespesa_id" name="tipodespesa_id" class="form-control select2" data-ng-model="n.formD.tipo_despesa_id" style="width: 100%;">
                                @foreach($tipos_despesa as $t)
                                    <option value="{{$t->id}}">{{$t->codigo}} {{$t->nome}}</option>
                                @endforeach
                            </select>
                        </div>                
                        <div class="form-group">
                            <label for="valor_despesa">Valor</label>
                            <input class="form-control " type="number" id="valor_despesa" name="valor_despesa" data-ng-model="n.formD.valor_despesa"/>
                        </div>
                    </div>
                                     
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-ng-click="n.addDespesa(n.formD)" data-dismiss="modal" >Adicionar</button>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <!-- /.modal -->
            <div class="modal fade" id="modal-quilometragem">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Quilometragem</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="quilometragem_data">Data</label>
                            <input type="text" class="form-control data" id="quilometragem_data" name="quilometragem_data" data-ng-model="n.formKm.quilometragem_data" />
                        </div>  
                        <div class="form-group">
                            <label for="quilometragem_origem">Origem</label>
                            <input type="text" class="form-control" id="quilometragem_origem" name="quilometragem_origem" data-ng-model="n.formKm.quilometragem_origem" />
                        </div>
                        <div class="form-group">
                            <label for="quilometragem_destino">Destino</label>
                            <input type="text" class="form-control" id="quilometragem_destino" name="quilometragem_destino" data-ng-model="n.formKm.quilometragem_destino" />
                        </div>                
                        <div class="form-group">
                            <label for="quilometragem_quantidade_km">Quantidade de Km</label>
                            <input class="form-control " type="number" id="quilometragem_quantidade_km" name="quilometragem_quantidade_km" data-ng-model="n.formKm.quilometragem_quantidade_km" />
                        </div>
                        <div class="form-group">
                            <label for="quilometragem_quantidade_km_valor">Valor por Km</label>
                            <input class="form-control " type="number" id="quilometragem_quantidade_km_valor" name="quilometragem_quantidade_km_valor" data-ng-model="n.formKm.quilometragem_quantidade_km_valor" />
                        </div>
                    </div>
                                     
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-ng-click="n.addQuilometragem(n.formKm)" data-dismiss="modal" >Adicionar</button>
                    </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>
</section>
@endsection
@section('external_js')
<!-- InputMask -->
<script src="{{asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('bower_components/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="{{asset('js/angular/controllers/notaController.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $(function (){
        $('.select2').select2();        
        $('.data').inputmask("99/99/9999");
    });
</script>
@endsection