@extends('adminlte::page')


@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Cadastro de Empresa</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('/empresa/novo') }}" method="POST">
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label for="inputCNPJ" class="col-sm-2 col-form-label">CNPJ:</label>
                            <div class="col-sm-6">
                                <input type="text" id="inputCNPJ" class="form-control @error('cnpj') is-invalid @enderror" name="cnpj" value="{{ old('cnpj') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputRazao" class="col-sm-2 col-form-label">Razão Social:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('razao') is-invalid @enderror" id="inputRazao" name="razao" value="{{ old('razao') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputContato" class="col-sm-2 col-form-label">Contato:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('contato') is-invalid @enderror" id="inputContato" name="contato" value="{{ old('contato') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefone" class="col-sm-2">Telefone:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control @error('telefone') is-invalid @enderror" id="inputTelefone" name="telefone" value="{{ old('telefone') }}"> 
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div><!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary" style="width: 300px">Gravar</button>
                <button type="submit" class="btn btn-default float-right">Cancelar</button>
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