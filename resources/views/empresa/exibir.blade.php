@extends('adminlte::page')


@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Empresa cadastrada</h3>
        </div>
        <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="inputCNPJ" class="col-sm-2 col-form-label">CNPJ:</label>
                            <div class="col-sm-6">
                                <input type="text" id="inputCNPJ" class="form-control" name="cnpj" value="{{ $empresa->cnpj }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputRazao" class="col-sm-2 col-form-label">Razão Social:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputRazao" name="razao" value="{{ $empresa->razao }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputContato" class="col-sm-2 col-form-label">Contato:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputContato" name="contato" value="{{ $empresa->contato }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefone" class="col-sm-2">Telefone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="inputTelefone" name="telefone" value="{{ $empresa->telefone }}" disabled> 
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div><!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-default float-right" href="{{route('empresa')}}">Cancelar</a>
            </div>
    <!-- /.card -->
@stop