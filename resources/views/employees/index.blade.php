@extends('adminlte::page')

@section('title', 'Funcionários')

@section('content_header')
    <h1>Funcionários</h1>
@stop

@section('content')
<<div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
                <div class="class-md-4">
                    <button type="button" id="btn-new-employee" class="btn btn-secondary"><i class="fas fa-plus" aria-hidden="true"></i> Novo Funcionário</button>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="tableEmployee">
                        <thead>
                            <tr>
                                <th width="30%">Nome</th>
                                <th class="text-center" width="25%">Filial</th>
                                <th class="text-center" width="15%">Cargo</th>
                                <th class="text-center" width="10%">Situação</th>
                                <th class="text-center" width="10%">Editar</th>
                                <th class="text-center" width="10%">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $list)
                                <tr>                                   
                                    <td width="30%" class="show-employees"
                                                        data-name="{{$list->name}}"
                                                        data-branch="{{$list->branch->name}}"
                                                        data-birthday="{{$list->birthday}}"
                                                        data-gender_id="{{$list->gender->gender}}"
                                                        data-cpf="{{$list->cpf}}"
                                                        data-full_address="{{$list->full_address}}"
                                                        data-role="{{$list->role}}"
                                                        data-amount="{{$list->amount}}"
                                                        data-status="{{$list->status}}"><a href="#" 
                                                        >{{$list->name}}</a></td>
                                    <td class="text-center" width="25%">{{$list->branch->name}}</td>
                                    <td class="text-center" width="15%">{{$list->role}}</td>
                                    @if($list->status == 1)
                                        <td class="text-center" width="10%"><small class="badge bg-success">ATIVO</small></td>
                                    @else
                                        <td class="text-center" width="10%"><small class="badge bg-danger">INATIVO</small></td>
                                    @endif

                                    <td class="text-center" width="10%">
                                        <button class="edit-employee" data-id="{{$list->id}}"
                                                                    data-name="{{$list->name}}">
                                                <i class="fas fa-pen-square" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="text-center" width="10%">
                                        <button class="remove-employee" data-id="{{$list->id}}" 
                                                                      data-name="{{$list->name}}">
                                                <i class="fas fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="show" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gray">
                <h4 class="modal-title bg-gray"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>   
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                          <label for="name">Nome</label>
                          <input type="text" class="form-control" id="name" name="name" disabled>
                       </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                          <label for="birthday">Data de Nascimento</label>
                          <input type="date" class="form-control" id="birthday" name="birthday" disabled>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Filial</label>
                        <input type="text" class="form-control" id="branch" name="branch_" disabled>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="full_address">Endereço Completo</label>
                          <input type="text" class="form-control" id="full_address" name="full_address" disabled>
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Gênero</label>
                        <input type="text" class="form-control" id="gender_id" name="gender_id" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="cpf">CPF</label>
                          <input type="text" class="form-control" id="cpf" name="cpf" disabled>
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Situação</label>
                        <input type="text" class="form-control" id="status" name="status" disabled>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="role">Cargo</label>
                          <input type="text" class="form-control" id="role" name="role" disabled>
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="amount">Salário</label>
                          <input type="float" class="form-control" id="amount" name="amount" disabled>
                       </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Fechar
                </button>
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
        $(document).ready( function () {
            $('#tableEmployee').DataTable({
                language: {
                    "sEmptyTable": "{{trans('principal.tabela.sEmptyTable')}}",
                    "sInfo": "{{trans('principal.tabela.sInfo')}}",
                    "sInfoEmpty": "{{trans('principal.tabela.sInfoEmpty')}}",
                    "sInfoFiltered": "{{trans('principal.tabela.sInfoFiltered')}}",
                    "sInfoPostFix": "{{trans('principal.tabela.sInfoPostFix')}}",
                    "sInfoThousands": "{{trans('principal.tabela.sInfoThousands')}}",
                    "sLengthMenu": "{{trans('principal.tabela.sLengthMenu')}}",
                    "sLoadingRecords": "{{trans('principal.tabela.sLoadingRecords')}}",
                    "sProcessing": "{{trans('principal.tabela.sProcessing')}}",
                    "sZeroRecords": "{{trans('principal.tabela.sZeroRecords')}}",
                    "sSearch": "{{trans('principal.tabela.sSearch')}}",
                    "oPaginate": {
                        "sNext": "{{trans('principal.tabela.paginacao.sNext')}}",
                        "sPrevious": "{{trans('principal.tabela.paginacao.sPrevious')}}",
                        "sFirst": "{{trans('principal.tabela.paginacao.sFirst')}}",
                        "sLast": "{{trans('principal.tabela.paginacao.sLast')}}",
                    },
                    "oAria": {
                        "sSortAscending": "{{trans('principal.tabela.sort.sSortAscending')}}",
                        "sSortDescending": "{{trans('principal.tabela.sort.sSortDescending')}}",
                    },
                },
            });
        });

        $(document).on('click','#btn-new-employee',function(e){
                e.preventDefault();
                window.location.replace("/employees/create/");
        });

        $(document).on('click','.edit-employee',function(e){
                e.preventDefault();
                var id = $(this).data('id');
                window.location.replace("/employees/"+id+"/edit");
        });

        $(document).on('click','.show-employees',function(e){
            e.preventDefault();
            
            var name = $(this).data('name');
            console.log(name);
            var branch = $(this).data('branch');
            var birthday = $(this).data('birthday');
            var gender_id = $(this).data('gender_id');
            var cpf = $(this).data('cpf');
            var full_address = $(this).data('full_address');
            var role = $(this).data('role');
            var amount = $(this).data('amount');
            var aux = $(this).data('status');
            if(aux = 1)
                var status = 'ATIVO';
            else
               var status = 'INATIVO'; 
            
            $('.modal-title').text("Funcionário");
            $("#name").val(name);
            $("#branch").val(branch);
            $("#birthday").val(birthday);
            $("#gender_id").val(gender_id);
            $("#cpf").val(cpf);
            $("#full_address").val(full_address);
            $("#role").val(role);
            $("#amount").val(amount);
            $("#status").val(status);
            $('#show').modal('show');
        });

        $(document).on('click','.remove-employee',function(e){
            e.preventDefault();
            var name = $(this).data('name');
            swal({
                title: "Deseja continuar?",
                text: "Deseja realmente excluir "+name+"!",
                icon: "warning",
                buttons: ["Cancelar","Confirmar"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    id = $(this).data('id');
                    $.ajax({
                        type: 'DELETE',
                        url: "employees/" + id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id' : id,
                        },
                        success: function() {
                            swal({
                                title: "Pronto, aperte OK para atualizar a página!",
                                text: "Funcionário removido com sucesso.",
                                icon: "success",
                            })
                                .then((value) => {
                                    location.reload();
                                });
                        },
                        error: function(data) {;
                            var erro = "Erro ao excluir funcionário";
                            swal("Erro",erro, "error");
                        },
                    })
                
                } else {
                    swal("Cancelado!","Operação cancelada com sucesso!","info");
                }
            }); 
        });
    
    </script>
@stop
