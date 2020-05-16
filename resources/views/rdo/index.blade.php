@extends('adminlte::page')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Lista de RDO</h3>
       </div>
        <!-- /.card-header -->
        <div class="card-body">
            <!-- Loading -->
            <div class="overlay" id="loadingtable">
                <i class="fas fa-2x fa-sync-alt"></i>
            </div>
            
            <table id="tabela1" class="table table-bordered table-striped table-sm" style="display: none">
            <thead>
            <tr>
                <th  style="width: 10%">#</th>
                <th>Contrato</th>
                <th>Criador</th>
                <th>Autorizador</th>
                <th>Data Início</th>
                <th>Data Término</th>
                <th>Localidade</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
                <!-- looop -->  
                @foreach($rdos as $rdo)
                    <tr>
                        <td>{{$rdo->numero}}</td>
                        <td>{{$rdo->contrato->numero}}</td>
                        <td>{{$rdo->criador->name}}</td>

                        @if($rdo->autorizador)
                        <td>{{$rdo->autorizador->name}}</td>
                        @else
                        <td>
                            <small class="badge badge-danger"><i class="far fa-minus-square"></i>&nbsp;Não liberado</small>
                        </td>
                        @endif

                        <td>{{ date('d-m-Y', strtotime($rdo->datainicio)) }}</td>
                        
                        @if($rdo->datafim)
                        <td>{{ date('d-m-Y', strtotime($rdo->datafim)) }}</td>
                        @else
                        <td>
                            <small class="badge badge-warning"><i class="far fa-clock"></i>&nbsp;Pendente</small>
                        </td>
                        @endif

                        <td>{{$rdo->localidade}}</td>
                        <td>
                        <a href="{{route('rdo.exibir', $rdo->id) }}" class="btn btn-warning btn-sm" role="button">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-sm" role="button">
                            <i class="fas fa-edit"></i>
                        </a>

                        @if($rdo->autorizador)
                        <a href="{{route('rdo.alterastatus', $rdo->id )}}" class="btn btn-danger btn-sm" onclick="return confirm('Deseja bloquear o RDO ?')" role="button">
                            <i class="fas fa-thumbs-down"></i>
                        </a>
                        @else
                        <a href="{{route('rdo.alterastatus', $rdo->id )}}" class="btn btn-success btn-sm" onclick="return confirm('O RDO será liberado, confirma ?')" role="button">
                            <i class="fas fa-thumbs-up"></i>
                        </a>
                        @endif

                        <a href="#" class="btn btn-dark btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
            </table>
            <a href="{{route('rdo.novo')}}" class="btn btn-outline-primary" role="button">Abrir Novo RDO</a>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@stop


@section('css')
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('js')
<script>
$('#tabela1').DataTable({
      "paging": true,
      "pageLength": 7,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": false,
      language: {
        "search": "Busca:",
        "zeroRecords":    "Sem resultados"
    }
});

$(document).ready(function () {
    $("#tabela1").css("display","");
    $('#loadingtable').hide();
});

</script>
@stop

