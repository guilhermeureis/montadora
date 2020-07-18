@extends('adminlte::page')

@section('title', 'Novo Funcionário')

@section('content_header')
    <h1>Editar Funcionário</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card card-secondary">
       <div class="card-header">
          <h3 class="card-title">Editar Funcionário</h3>
       </div>
       <form role="form">
          <div class="card-body">
              <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="birthday">Data de Nascimento</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{$employee->birthday}}">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                    <label>Filial</label>
                    <select class="form-control select2" style="width: 100%;" id="branch_id" name="branch_id">
                    <option value="{{$employee->branch->id}}" selected="selected">{{$employee->branch->name}}</option>
                        @foreach($branches as $list)
                            @if ($list->id != $employee->branch->id) 
                                <option value="{{$list->id}}">{{$list->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="full_address">Endereço Completo</label>
                        <input type="text" class="form-control" id="full_address" name="full_address" value="{{$employee->full_address}}">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label>Gênero</label>
                    <select class="form-control select2" style="width: 100%;" id="gender_id" name="gender_id">
                        <option value="{{$employee->gender->id}}" selected="selected">{{$employee->gender->gender}}</option>
                            @foreach($genders as $list)
                                @if ($list->id != $employee->gender->id)
                                    <option value="{{$list->id}}">{{$list->gender}}</option>
                                @endif
                            @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="{{$employee->cpf}}">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                    <label>Situação</label>
                    <select class="form-control select2" style="width: 100%;" id="status" name="status">
                        @if ($employee->status == 1)
                            <option value="1" selected="selected">ATIVO</option>
                            <option value="0">INATIVO</option>
                        @else
                            <option value="0" selected="selected">INATIVO</option>
                            <option value="1">ATIVO</option>
                        @endif
                    </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="role">Cargo</label>
                        <input type="text" class="form-control" id="role" name="role" value="{{$employee->role}}">
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label for="amount">Salário</label>
                        <input type="float" class="form-control" id="amount" name="amount" value="{{$employee->amount}}">
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" disabled>
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="password">Automático</label>
                        <button type="submit" class="btn btn-block btn-success" id="gerar_password">Gerar Nova Senha</button>
                     </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
             <button type="submit" class="btn btn-primary" id="editar-employees" data-id="{{$employee->id}}">Editar</button>
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

        $(document).ready(function(){
            $('#amount').maskMoney();
            $('#cpf').mask('000.000.000-00', {reverse: true});
        });

        $(document).on('click','#gerar_password',function(e){
            e.preventDefault();
            var aux = Array.apply(null, Array(1)).map(gerarPassword);
            var pass = aux.toString();
            $("#password").val(pass);
        });

        function gerarPassword() {
            return Math.random().toString(36).slice(-6);
        }

        $('#editar-employees').on('click',function (e) {
            e.preventDefault();
            var amount = $("#amount").maskMoney('unmasked')[0] == 0 ? null : $("#amount").maskMoney('unmasked')[0];
            var id = $(this).data('id');
            $.ajax({
                    type: 'PUT',
                    url: "/employees/"+id,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'name': $("#name").val(),
                        'branch_id': $("#branch_id").val(),
                        'birthday': $("#birthday").val(),
                        'gender_id': $("#gender_id").val(),
                        'cpf': $("#cpf").val(),
                        'full_address': $("#full_address").val(),
                        'role': $("#role").val(),
                        'amount': amount,
                        'status': $("#status").val(),
                        'password': $("#password").val()
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
                                location.replace("/employees");
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
                            if (dados.errors.birthday) {
                                var linha_nova = dados.errors.birthday.toString();
                                var linha = linha_nova.replace("O campo birthday", "Data de Nascimento");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.gender_id) {
                                var linha_nova = dados.errors.gender_id.toString();
                                var linha = linha_nova.replace("O campo gender id", "Gênero");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.cpf) {
                                var linha_nova = dados.errors.cpf.toString();
                                var linha = linha_nova.replace("O campo cpf", "CPF");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.full_address) {
                                var linha_nova = dados.errors.full_address.toString();
                                var linha = linha_nova.replace("O campo full address", "Endereço Completo");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.role) {
                                var linha_nova = dados.errors.role.toString();
                                var linha = linha_nova.replace("O campo role", "Cargo");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.amount) {
                                var linha_nova = dados.errors.amount.toString();
                                var linha = linha_nova.replace("O campo amount", "Salário");
                                erro = erro + "-> " + linha + "\n";
                            }
                            if (dados.errors.status) {
                                var linha_nova = dados.errors.status.toString();
                                var linha = linha_nova.replace("O campo status", "Situação");
                                erro = erro + "-> " + linha + "\n";
                            }
                        }

                        swal("Erro",erro, "error");
                    },
                });
        });
    </script>
@stop
