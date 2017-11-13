<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-ng-app="notasDebitoModule">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>    
    <div class="container" data-ng-controller="UserController as uc">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" via-cep-form>
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cpf_cnpj" class="col-md-4 control-label">Cpf/Cnpj</label>
                                <div class="col-md-6">
                                    <input id="cpf_cnpj" type="text" class="form-control"  name="cpf_cnpj"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cep" class="col-md-4 control-label">Cep</label>
                                <div class="col-md-4">
                                    <input id="cep" type="text" class="form-control" ng-model="uc.address.zipcode" name="cep" via-cep="cep" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-md-4 control-label">Endereço</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" ng-model="uc.address.street" name="address" via-cep="logradouro" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="house_number" class="col-md-4 control-label">Numero</label>
                                <div class="col-md-4">
                                    <input id="house_number" type="text" class="form-control" ng-model="uc.address.house_number" name="house_number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="district" class="col-md-4 control-label">Bairro</label>
                                <div class="col-md-6">
                                    <input id="district" type="text" class="form-control" ng-model="uc.address.district" name="district" via-cep="bairro" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-4 control-label">Cidade</label>
                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control" ng-model="uc.address.city" name="city" via-cep="localidade" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state" class="col-md-4 control-label">UF</label>
                                <div class="col-md-2">
                                    <input id="state" type="text" class="form-control" ng-model="uc.address.state" name="state" via-cep="uf" />
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-viacep/dist/angular-viacep.min.js') }}"></script>
    <script src="{{ asset('js/angular/app.js') }}"></script>
    <script src="{{ asset('js/angular/controllers/userController.js') }}"></script>
</body>
</html>
