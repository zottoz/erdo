@extends('adminlte::page')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Lista de Contratos</h3>
       </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabela1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Empresa</th>
                <th>Número</th>
                <th>Objeto</th>
                <th>Inicio</th>
                <th>Fim</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
                <!-- looop -->  
                @foreach($contratos as $contrato)
                    <tr>
                        <td style="width: 20%">{{$contrato->empresa->razao}}</td>
                        <td style="width: 10%">{{$contrato->numero}}</td>
                        <td style="width: 35%">{{$contrato->objeto}}</td>
                        <td style="width: 10%">{{$contrato->inicio}}</td>
                        <td style="width: 10%">{{$contrato->fim}}</td>
                        <td style="width: 15%">
                        <a href="{{route('contrato.exibir', $contrato->id) }}" class="btn btn-warning btn-sm" role="button">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('contrato.editar', $contrato->id) }}" class="btn btn-success btn-sm" role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('contrato.excluir', $contrato->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Confirma a exclusão?')" role="button">
                            <i class="fas fa-trash"></i>
                        </a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
            </table>
            <a href="{{route('contrato.novo')}}" class="btn btn-outline-primary" role="button">Adicionar Contrato</a>

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
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
      language: {
        "search": "Busca:",
        "zeroRecords":    "Sem resultados"
    }
});
</script>
@stop

