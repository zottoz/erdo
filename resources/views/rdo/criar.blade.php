@extends('adminlte::page')

@section('content')

    <!-- Horizontal Form -->
    <div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Novo e-RDO</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6"><!-- lado direito -->
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-2 col-form-label">Contrato:</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm">
                                        <option>460000111</option>
                                        <option>460000222</option>
                                        <option>460000333</option>
                                        <option>111111111</option>
                                        <option>222222222</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-2 col-form-label">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="inputContrato"disabled value="Enrolação Generalizada Ltda">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-2 col-form-label">Objeto:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control form-control-sm" id="objeto" rows="2" disabled>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque beatae quas at recusandae tenetur laudantium sequi tempore voluptatum odit. Beatae adipisci odit quos magnam facere ullam quidem eius maiores unde.
                                    </textarea>
                                </div>
                            </div>
                    </div><!-- fim lado direito -->

                    <div class="col-sm-6"><!-- lado esquerdo -->
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-4 col-form-label">Local:</label>
                                <div class="col-sm-5">
                                <select class="form-control form-control-sm">
                                        <option>Coari AM</option>
                                        <option>Manaus AM</option>
                                        <option>Belém PA</option>
                                        <option>São Luis MA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-4 col-form-label">Tempo:</label>
                                <div class="col-sm-5">
                                    <select class="form-control form-control-sm">
                                        <option>Bom</option>
                                        <option>Ruim</option>
                                        <option>Chuva</option>
                                        <option>Tempestade</option>
                                        <option>Quente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-4 col-form-label">Mão-de-obra:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control-sm" id="inputMO">
                                </div>
                            </div>
                    </div><!-- fim lado esquerdo -->
                </div>
                <hr/>
                <!-- botao de busca e dropdown -->
                <div class="row">
                    <div class="col-sm-12">
                            <div class="form-group row">
                                <div id="conteudoBusca" class="dropdown dropdown-content">
                                    <input type="text" class="form-control" id="inputBusca" placeholder="busca.." >
                                </div>
                            </div>
                    </div>
                </div>

<br/><br/>
                <!-- itens selecinados p RDO -->
                <table class="table table-striped table-sm" id="tabelaItens">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Descrição</th>
                      <th>Valor</th>
                      <th>U.M.</th>
                      <th>Quantidade</th>
                      <th>Ação</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>


            </div><!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm" style="width: 300px">Criar</button>
                <button type="submit" class="btn btn-default float-right">Cancelar</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

@stop

@section('js')

<script type="text/javascript">
    $(document).ready(function () {

        $('#inputBusca').on('keyup',function() {
            $('#conteudoBusca a').remove();
            var query   = $('#inputBusca').val();
            var tamanho = $('#inputBusca').val().length;
            if( tamanho > 3){
                $.ajax({                
                    url:"{{ route('buscaItensDaPPU') }}",            
                    type:"GET",                
                    data:{'termo':query},                
                    success:function (data) {
                        $('#conteudoBusca a').remove();
                        data.forEach(element => {
                            var item = document.createElement('a');
                            item.setAttribute('href', '#');
                            item.setAttribute('data-item',      element.item);
                            item.setAttribute('data-descricao', element.descricao);
                            item.setAttribute('data-um',        element.um);
                            item.setAttribute('data-valor',     element.valor);
                            item.className = "itemSelecionado" ;                       
                            item.appendChild( document.createTextNode(
                                element.item + '  - ' + element.descricao + '   ( Valor: ' +element.valor + ' )'
                            ));
                            $('#conteudoBusca').append(item);
                        }); // fim forEach
                    }
                })
            }
        });//fim busca-Ajax

        //insere na tabela os valores selecionados
        $('#conteudoBusca').on('click', '.itemSelecionado', function(e){ 
        var newRow = $(
            '<tr>'+
            '<td>'+ $(e.target).data('item')        +'</td>'+
            '<td>'+ $(e.target).data('descricao')   +'</td>'+
            '<td>'+ $(e.target).data('valor')       +'</td>'+
            '<td>'+ $(e.target).data('um')          +'</td>'+
            '<td><div class="col-4"><input type="text" id="qnt1" class="form-control form-control-sm"></div></td>'+
            '<td><button class="btn btn-danger btn-sm" id="deleteButton">Excluir</button></td>'+
            '</tr>');   
            //cria nova linha
            $('#conteudoBusca a').remove();
            $('#tabelaItens tbody:last').append(newRow);       
        }); 
        //apaga uma linha da tabela
        $("#tabelaItens").on("click", "#deleteButton", function() {
            $(this).closest("tr").remove();
        });

    }); //fim do document-ready
</script>

@stop

@section('css')
<style>
/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: block;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 600px;
  border: 1px solid #ddd;
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #d5d5d5}

</style>
@stop