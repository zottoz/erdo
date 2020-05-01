@extends('adminlte::page')


@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Contrato</h3>
        </div>
        <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="inputCNPJ" class="col-sm-2 col-form-label">Empresa :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="empresa" value="{{ $contrato->empresa->razao }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputCNPJ" class="col-sm-2 col-form-label">Número :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="numero" value="{{ $contrato->numero }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputRazao" class="col-sm-2 col-form-label">Objeto :</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" rows="5" name="objeto" disabled>{{ $contrato->objeto }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputContato" class="col-sm-2 col-form-label">Inicio :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="inicio" value="{{ $contrato->inicio }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefone" class="col-sm-2">Fim :</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="fim" value="{{ $contrato->fim }}" disabled> 
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div><!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-default float-right" href="{{route('contrato')}}">Cancelar</a>
            </div>
    <!-- /.card -->
@stop