@extends('adminlte::page')

@section('content')

<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">RDO</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal">
    @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6"><!-- lado direito -->
                        <div class="form-group row">
                            <label for="inputContrato" class="col-sm-4 col-form-label">Contrato:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->contrato->numero }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Empresa:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->contrato->empresa->razao }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">RDO n:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->numero }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Usuario que emitiu:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->criador->email }}" disabled>
                            </div>
                        </div>
                </div><!-- fim lado direito -->

                <div class="col-sm-6"><!-- lado esquerdo -->
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Local:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->localidade }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Tempo:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->tempo }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Mão-de-obra:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" value="{{ $rdo->qntpessoas }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Data de Inicio:</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control form-control-sm" value="{{ date('d-m-Y', strtotime($rdo->datainicio)) }}" disabled>
                            </div>
                        </div>
                </div><!-- fim lado esquerdo -->
            </div>

            <hr/>

            <!-- itens selecinados p RDO -->
            <table class="table table-striped table-sm" id="tabelaItens">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descrição</th>
                    <th>U.M.</th>
                    <th>Quantidade</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rdo->itens as $item)
                <tr>
                    <td>{{$item->item}}</td>
                    <td>{{$item->descricao}}</td>
                    <td>{{$item->um}}</td>
                    <td>{{$item->pivot->quantidade}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div><!-- /.card-body -->

        <div class="card-footer">
            @if($rdo->autorizador)
            <a href="{{route('rdo.alterastatus', $rdo->id )}}" class="btn btn-outline-danger" style="width: 400px">Reprovar</a>
            @else
            <a href="{{route('rdo.alterastatus', $rdo->id )}}" class="btn btn-outline-success" style="width: 400px">Aprovar</a>
            @endif

            <a href="{{ route('rdo') }}" class="btn btn-default float-right">Retornar</a>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /. fim card principal-->



@stop

@section('js')

<script type="text/javascript">

$(document).ready(function () {


}); //fim do document-ready

</script>


@stop
