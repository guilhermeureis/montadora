@extends('adminlte::page')

@section('title', 'Novo Automóvel')

@section('content_header')
    <h1>Editar Automóvel</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card card-secondary">
       <div class="card-header">
          <h3 class="card-title">Automóvel</h3>
       </div>
       <form role="form">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$automobile->name}}">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Filial</label>
                      <select class="form-control select2" style="width: 100%;" id="branch_id" name="branch_id">
                        <option value="{{$automobile->branch_id}}" selected="selected">{{$automobile->branch->name}}</option>
                            @foreach($branches as $list)
                                @if ($list->id != $automobile->branch_id)
                                    <option value="{{$list->id}}">{{$list->name}}</option>
                                @endif
                            @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="year">Ano</label>
                        <input type="number" class="form-control" id="year" name="year" value="{{$automobile->year}}">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" value="{{$automobile->model}}">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="color">Cor</label>
                        <input type="text" class="form-control" id="color" name="color" value="{{$automobile->color}}">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="chassi_number">Número do Chassi</label>
                        <input type="text" class="form-control" id="chassi_number" name="chassi_number" value="{{$automobile->chassi_number}}">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control select2" style="width: 100%;" id="category_id" name="category_id">
                      <option value="{{$automobile->category_id}}" selected="selected">{{$automobile->category->category}}</option>
                            @foreach($categories as $list)
                                @if ($list->id != $automobile->category->id)
                                    <option value="{{$list->id}}">{{$list->category}}</option>
                                @endif
                            @endforeach
                      </select>
                    </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
             <button type="submit" class="btn btn-primary" data-id="{{$automobile->id}}" id="editar-automobiles">Editar</button>
          </div>
       </form>
    </div>
</div>

<div id="carregamento" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="modal-title bg-dark" id="carregamento">Carregando...</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <img style="width: 240px;height: 125px;" src="{{ asset('images/carrega.gif') }}" class="center">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 style="text-align: center;"> Aguarde o Processamento!</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $('#editar-automobiles').on('click',function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                    type: 'PUT',
                    url: "/automobiles/"+id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'name': $("#name").val(),
                        'branch_id': $("#branch_id").val(),
                        'year': $("#year").val(),
                        'model': $("#model").val(),
                        'color': $("#color").val(),
                        'chassi_number': $("#chassi_number").val(),
                        'category_id': $("#category_id").val()
                    },
                    beforeSend: function() {
                        $('#carregamento').modal('show');
                    },
                    success: function() {
                        $('#carregamento').modal('hide');
                        swal({
                            title: "Pronto, aperte OK para continuar!",
                            text: "Dados foram salvos com sucesso!",
                            icon: "success",
                        })
                            .then((value) => {
                                location.replace("/automobiles");
                            });
                    },
                    error: function(data) {
                        $('#carregamento').modal('hide');
                        var dados = $.parseJSON(data.responseText);
                        var erro = "";

                        if(typeof dados.errors != "undefined") {
                            if (dados.errors.name) {
                                var linha_nova = dados.errors.name.toString();
                                var linha = linha_nova.replace("O campo nome", "Nome");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.branch_id) {
                                console.log(dados.errors.branch_id.toString());
                                var linha_nova = dados.errors.branch_id.toString();
                                var linha = linha_nova.replace("O campo branch id", "Filial");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.year) {
                                var linha_nova = dados.errors.year.toString();
                                var linha = linha_nova.replace("O campo year", "Ano");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.model) {
                                var linha_nova = dados.errors.model.toString();
                                var linha = linha_nova.replace("O campo model", "Modelo");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.color) {
                                var linha_nova = dados.errors.color.toString();
                                var linha = linha_nova.replace("O campo color", "Cor");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.chassi_number) {
                                var linha_nova = dados.errors.chassi_number.toString();
                                var linha = linha_nova.replace("O campo chassi number", "Número do Chassi");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.category_id) {
                                var linha_nova = dados.errors.category_id.toString();
                                var linha = linha_nova.replace("O campo category id", "Categoria");
                                erro = erro + "-> " + linha + "\n";
                            }
                        }

                        swal("Erro",erro, "error");
                    },
                });
        });
    </script>
@stop
