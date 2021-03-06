@extends('adminlte::page')

@section('title', 'Novo Automóvel')

@section('content_header')
    <h1>Novo Automóvel</h1>
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
                        <input type="text" class="form-control" id="name" name="name">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Filial</label>
                      <select class="form-control select2" style="width: 100%;" id="branch_id" name="branch_id">
                        <option value="" selected="selected">Escolha uma opção</option>
                            @foreach($branches as $list)
                                <option value="{{$list->id}}">{{$list->name}}</option>
                            @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="year">Ano</label>
                        <input type="number" class="form-control" id="year" name="year">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="model">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="color">Cor</label>
                        <input type="text" class="form-control" id="color" name="color">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="chassi_number">Número do Chassi</label>
                        <input type="text" class="form-control" id="chassi_number" name="chassi_number">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Categoria</label>
                      <select class="form-control select2" style="width: 100%;" id="category_id" name="category_id">
                        <option value="" selected="selected">Escolha uma opção</option>
                            @foreach($categories as $list)
                                <option value="{{$list->id}}">{{$list->category}}</option>
                            @endforeach
                      </select>
                    </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
             <button type="submit" class="btn btn-primary" id="salvar-automobiles">Salvar</button>
          </div>
       </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> 
        $('#salvar-automobiles').on('click',function (e) {
            e.preventDefault();
            $.ajax({
                    type: 'POST',
                    url: '/automobiles',
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
