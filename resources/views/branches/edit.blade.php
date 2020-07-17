@extends('adminlte::page')

@section('title', 'Editar Filial')

@section('content_header')
    <h1>Editar Filial</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card card-secondary">
       <div class="card-header">
          <h3 class="card-title">Filial</h3>
       </div>
       <form>
          <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$branch->name}}">
                     </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="full_address">Endereço Completo</label>
                        <input type="text" class="form-control" id="full_address" name="full_address" value="{{$branch->full_address}}">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="state_registration">Registro Estadual</label>
                        <input type="text" class="form-control" id="state_registration" name="state_registration" value="{{$branch->state_registration}}">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{$branch->cnpj}}">
                     </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
             <button type="submit" class="btn btn-primary" id="editar-branches" data-id="{{$branch->id}}">Editar</button>
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
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> 

        $(document).ready(function(){
            $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
        });

        $('#editar-branches').on('click',function (e) {
            var id = $(this).data('id');
            e.preventDefault();
            $.ajax({
                type: 'PUT',
                url: "/branches/"+ id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $("#name").val(),
                    'full_address': $("#full_address").val(),
                    'state_registration': $("#state_registration").val(),
                    'cnpj': $("#cnpj").val()
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
                            location.replace("/branches");
                        });
                },
                error: function(data) {
                    $('#carregamento').modal('hide');
                    var dados = $.parseJSON(data.responseText);
                    var erro = "";
                    console.log(dados);

                    if(typeof dados.errors != "undefined") {
                        if (dados.errors.name) {
                            var linha_nova = dados.errors.name.toString();
                            var linha = linha_nova.replace("O campo nome", "Nome");
                            erro = erro + "-> " + linha + "\n";
                        }
                        if (dados.errors.full_address) {
                            console.log(dados.errors.full_address.toString());
                            var linha_nova = dados.errors.full_address.toString();
                            var linha = linha_nova.replace("O campo full address", "Endereço Completo");
                            erro = erro + "-> " + linha + "\n";
                        }
                        if (dados.errors.cnpj) {
                            var linha_nova = dados.errors.cnpj.toString();
                            var linha = linha_nova.replace("O campo cnpj", "CNPJ");
                            erro = erro + "-> " + linha + "\n";
                        }
                        if (dados.errors.state_registration) {
                            var linha_nova = dados.errors.state_registration.toString();
                            var linha = linha_nova.replace("O campo state registration", "Registro Estadual");
                            erro = erro + "-> " + linha + "\n";
                        }
                    }

                    swal("Erro",erro, "error");
                },
            });
            });
    </script>
@stop
