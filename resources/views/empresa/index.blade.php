@extends('adminlte::page')

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Lista de Empresas</h3>
       </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tabela1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>C N P J</th>
                <th>Razão Social</th>
                <th>Contato</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
                <!-- looop -->  
                @foreach($empresas as $empresa)
                    <tr>
                        <td style="width: 20%">{{$empresa->cnpj}}</td>
                        <td style="width: 35%">{{$empresa->razao}}</td>
                        <td style="width: 15%">{{$empresa->contato}}</td>
                        <td style="width: 15%">{{$empresa->telefone}}</td>
                        <td style="width: 15%">
                        <a href="{{route('empresa.exibir', $empresa->id) }}" class="btn btn-warning btn-sm" role="button">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{route('empresa.editar', $empresa->id) }}" class="btn btn-success btn-sm" role="button">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{route('empresa.excluir', $empresa->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')" role="button">
                            <i class="fas fa-trash"></i>
                        </a>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
            </table>
            <a href="{{route('empresa.novo')}}" class="btn btn-outline-primary" role="button">Adicionar nova empresa</a>

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

