@extends('adminlte::page')


@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Editar</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('contrato.alterar', $contrato->id) }}" method="POST">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Empresa : </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="empresa" value="{{ $contrato->empresa->razao }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Número : </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ $contrato->numero }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Objeto: </label>
                            <div class="col-sm-6">
                                <textarea class="form-control @error('objeto') is-invalid @enderror" name="objeto">{{ $contrato->objeto }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Inicio:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control @error('inicio') is-invalid @enderror" id="inputInicio" name="inicio" value="{{ $contrato->inicio }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Fim:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control @error('fim') is-invalid @enderror" id="inputFim" name="fim" value="{{ $contrato->fim }}"> 
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div><!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary" style="width: 300px">Gravar</button>
                <a class="btn btn-default float-right" href="{{route('contrato')}}">Cancelar</a>
            </div>
            <!-- /.card-footer -->
            
        </form>

    <!-- /.card -->
@stop

@section('js')
@notify_js
<script src="/vendor/inputmask/dist/jquery.inputmask.js"></script>
<script>
    $(document).ready(function(){
        //configuração do calendario

    });
</script>
@notify_render
@stop

@section('css')
    @notify_css
@stop