@extends('adminlte::page')


@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Cadastro de Contrato</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ route('contrato.gravar') }}" method="POST">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Empresa:</label>
                            <div class="col-sm-6">
                                <select name="empresa_id">
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id}}">{{$empresa->razao}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Número:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Objeto:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('objeto') is-invalid @enderror" name="objeto" value="{{ old('objeto') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Inicio:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control @error('inicio') is-invalid @enderror" name="inicio" value="{{ old('inicio') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Fim:</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control @error('fim') is-invalid @enderror" name="fim" value="{{ old('fim') }}"> 
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
        $('#inputCNPJ').inputmask("99.999.999/9999-99");
        $('#inputTelefone').inputmask({"mask": "(99) 9999-9999"});
    });
</script>
@notify_render
@stop

@section('css')
    @notify_css
@stop