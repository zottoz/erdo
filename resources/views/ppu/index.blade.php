@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Importar PPU (xls)
        </div>
        <div class="card-body">

            <form action="{{ route('ppu.importar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputContrato" class="col-sm-2 col-form-label">Contrato:</label>
                    <div class="col-sm-4">
                        <select class="form-control form-control-sm" id="inputContrato" name="contrato_id">
                            <option value=""></option>
                        @foreach($contratos as $contrato)
                            <option value="{{$contrato->id}}">{{$contrato->numero}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <br/><br/>
                <input type="file" name="arquivo" class="form-control">
                <br>
                <button type="submit" class="btn btn-outline-primary btn-block">Enviar</button>
            </form>
        </div>
    </div>
</div>
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