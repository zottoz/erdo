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
        @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6"><!-- lado direito -->
                            <div class="form-group row">
                                <label for="inputContrato" class="col-sm-2 col-form-label">Contrato:</label>
                                <div class="col-sm-10">
                                    <select class="form-control form-control-sm" id="inputContrato" name="contrato">
                                        <option value=""></option>
                                    @foreach($contratos as $contrato)
                                        <option value="{{$contrato->id}}">{{$contrato->numero}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Empresa:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" id="inputEmpresa" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">Objeto:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control form-control-sm" id="inputObjeto" rows="2" disabled></textarea>
                                </div>
                            </div>
                    </div><!-- fim lado direito -->

                    <div class="col-sm-6"><!-- lado esquerdo -->
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Local:</label>
                                <div class="col-sm-5">
                                <select class="form-control form-control-sm" id="inputLocal" name="localidade">
                                        <option value="Coari AM">Coari AM</option>
                                        <option value="Manaus AM">Manaus AM</option>
                                        <option value="Belém PA">Belém PA</option>
                                        <option value="São Luis MA">São Luis MA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Tempo:</label>
                                <div class="col-sm-5">
                                    <select class="form-control form-control-sm" id="inputTempo" name="tempo">
                                        <option value="Bom">Bom</option>
                                        <option value="Ruim">Ruim</option>
                                        <option value="Péssimo">Péssimo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-4 col-form-label">Mão-de-obra:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control form-control-sm" id="inputQndPessoas" name="qntpessoas">
                                </div>
                            </div>
                    </div><!-- fim lado esquerdo -->
                </div>
                <hr/>
                <!-- botao de busca e dropdown -->
                <div class="row">
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <div id="conteudoBusca" class="dropdown dropdown-content">
                                <input type="text" class="form-control" id="inputBusca" placeholder="busca itens.." >
                            </div>
                        </div>
                    </div>
                    <div class="btn-quickview"> 
                        <a href="#" id="abrePPU"> <!-- data-toggle="modal" data-target="#modal-itens" -->
                            <i class="fa fa-search-plus" aria-hidden="true">
                            </i> Ver PPU
                        </a> 
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
                <a href="#" class="btn btn-success btn-sm" style="width: 300px" id="criarRdo">Criar</a>
                <a href="#" class="btn btn-default float-right">Cancelar</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

<!-- ------------------------------------------------------------------------ -->
    <!-- MODAL exibe itens da PPU -->
    <div class="modal fade" id="itensModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Itens da PPU</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> <!-- tabela com os itens -->
                <!-- CONTEUDO MODAL -->
                <table class="table table-bordered table-striped" id="tabelaModal">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Descrição</th>
                        <th>Und M</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@stop

@section('js')

<script type="text/javascript">

    $(document).ready(function () {
        /* busca os itens da busca de determinado contrato
           gera uma lista dinamica com os itens numa tabela */ 
        $('#inputBusca').on('keyup click',function() {
            $('#conteudoBusca a').remove();
            var query   = $('#inputBusca').val();

            //seleciona o contrato
            var contratoId = $('#inputContrato').val();

            console.log('Busca itens ajax' + contratoId);

            var tamanho = $('#inputBusca').val().length;
            if( tamanho > 2){
                $.ajax({                
                    url:"{{ route('buscaItensDaPPU') }}",            
                    type:"GET",                
                    data:{'termo':query, 'contratoId':contratoId},                
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
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });//------ fim busca de itens na busca

        /* busca dados do contrato selecionado
         */ 
        $('#inputContrato').on('change', function(){
            var id = $(this).val();
            if(!id) return ;            
            $.ajax({                
                    url:"{{ route('buscaDadosContrato') }}",            
                    type:"GET",                
                    data:{'termo': id},                
                    success:function (data) {
                        $('#inputObjeto').val(data[0]);
                        $('#inputEmpresa').val(data[1]);
                    }
            });

        });

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
            $('#conteudoBusca a').remove(); //apaga a lista
            $('#tabelaItens tbody:last').append(newRow);       
        }); 

        //apaga uma linha da tabela
        $("#tabelaItens").on("click", "#deleteButton", function() {
            $(this).closest("tr").remove();
        });

        /* ==========================================================================================
            Salva um RDO e as linhas da tabela
            Modificado em: 10-05-2020
           ==========================================================================================
        */
        // converte as linhas em Json
        function converteTabelaEmJson()
        {
            var itensDoRdo = new Array();
            $('#tabelaItens tr').each(function(row, tr){
                itensDoRdo[row]={
                    "item" :        $(tr).find('td:eq(0)').text(),
                    "quantidade":   $(tr).find('td').find('input').val()
                }    
            }); 
            itensDoRdo.shift();  // remove o cabeçalho
            return itensDoRdo;
        }
        // limpa os campos
        function limpaCampos()
        {
            $('#tabelaItens tbody').find('tr').each( function()
            {
                $(this).parents("tr").remove();
            });
        }

        $('#criarRdo').on('click', function(event){
            //event.preventDefault();

            var itens       = {};
            var contratoId  = $('#inputContrato').val();
            var localidade  = $('#inputLocal').val();
            var qntpessoas  = $('#inputQndPessoas').val();
            var tempo       = $('#inputTempo').val();

            info = [localidade, tempo, qntpessoas, contratoId];

            itens = converteTabelaEmJson();    

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({                
                    url:"{{ route('rdo.gravar') }}",            
                    type:"POST",                
                    data: {'itens' : itens, 'info' : info },
                    //dataType: 'json',  
                    processData: true,              
                    success:function (data) {
                        console.log(data);
                        limpaCampos();
                    },
                    error: function(error) {
                        console.log(error);
                    }
            });

        });

        /* ==========================================================================================
            Busca itens da PPU e preenche no MODAL
            Modificado em: 13-05-2020
           ==========================================================================================
        */
        $('#abrePPU').on('click', function(e){
            e.preventDefault();
            var contratoId  = $('#inputContrato').val();
            var linhas = '';
            $('#tabelaModal tbody').empty();
            $.ajax({                
                    url:"{{ route('buscaPPUContrato') }}",            
                    type:"GET",                
                    data: {'contratoId' : contratoId },
                    dataType: 'json',  
                    processData: true,              
                    success:function (data) {
                        data.forEach( function(item){
                            var linha = '<tr>' + 
                                        '<td>' + item.item + '</td>' +
                                        '<td>' + item.descricao + '</td>' +
                                        '<td>' + item.um + '</td>' +
                                        '<td>' + item.quantidade + '</td>' +
                                        '<td>' + item.valor + '</td>' +                                        
                                        '</tr>';
                            linhas = linhas + linha ;
                        });
                        $('#tabelaModal tbody').append(linhas);
                        $('#itensModal').modal('toggle');
                    },
                    error: function(err) {
                        console.log(err.status +' '+err.statusText);
                    }
            });

        });




    }); //fim do document-ready


</script>

@stop

@section('css')
    <!-- NOTIFICACAO POP-UP -->
    @notify_css

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

