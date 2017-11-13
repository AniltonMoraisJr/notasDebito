@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Nova Empresa</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>    
        <li><a href="#"><i class="fa fa-dashboard"></i> Empresas</a></li>
        <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Novo</a></li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Informe os dados abaixo</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{route('empresa.store')}}" enctype="multipart/form-data" via-cep-form>
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="img_url">Logo</label>
                            <input type="file" id="img_url" name="img_url"/>

                            <p class="help-block">Entre com um logo de 86 X 70px.</p>
                        </div>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Entre com o nome da empresa"/>
                        </div>
                        <div class="form-group">
                            <label for="cpf_cnpj">CNPJ/CPF</label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="Entre com um Cnpj ou CPF válido">
                        </div>
                        <div class="form-group">
                            <label for="inscricao_estadual">Inscrição Estadual</label>
                            <input type="text" class="form-control" id="inscricao_estadual" name="inscricao_estadual" placeholder="Entre com a Inscrição Estadual">
                        </div>
                        <div class="col-md-4">
                            <label for="cep">Cep</label>
                            <input id="cep" type="text" class="form-control"   ng-model="address.cep" name="cep" via-cep="cep" />
                        </div>
                        <div class="col-md-4">
                            <label for="endereco">Endereço</label>
                            <input id="endereco" type="text" class="form-control"   ng-model="address.endereco" name="endereco" via-cep="logradouro" />
                        </div>
                        <div class="col-md-4">
                            <label for="numero">Numero</label>
                            <input id="numero" type="text" class="form-control" ng-model="address.numero" name="numero"/>
                        </div>
                        <div class="col-md-4">
                            <label for="bairro">Bairro</label>
                            <input id="bairro" type="text" class="form-control"   ng-model="address.bairro" name="bairro" via-cep="bairro" />
                        </div>
                        <div class="col-md-4">
                            <label for="cidade">Cidade</label>
                            <input id="cidade" type="text" class="form-control"   ng-model="address.cidade" name="cidade" via-cep="localidade" />
                        </div>
                        <div class="col-md-4">
                            <label for="estado">UF</label>
                            <input id="estado" type="text" class="form-control"   ng-model="address.estado" name="estado" via-cep="uf" />
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection