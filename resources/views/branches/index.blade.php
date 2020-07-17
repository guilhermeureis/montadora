@extends('adminlte::page')

@section('title', 'Filiais')

@section('content_header')
    <h1>Filiais</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <div class="class-md-4">
                    <button type="button" id="btn-new-branch" class="btn btn-secondary"><i class="fas fa-plus" aria-hidden="true"></i> Nova Filial</button>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="tableBranches">
                        <thead>
                            <tr>
                                <th width="40%">Filial</th>
                                <th class="text-center" width="20%">Inscrição Estadual</th>
                                <th class="text-center" width="20%">CNPJ</th>
                                <th class="text-center" width="10%">Editar</th>
                                <th class="text-center" width="10%">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($branches as $list)
                                <tr>                                   
                                    <td width="40%" class="show-branch" data-name="{{$list->name}}"
                                                                        data-state_registration="{{$list->state_registration}}"
                                                                        data-full_address="{{$list->full_address}}"
                                                                        data-cnpj="{{$list->cnpj}}">
                                                                        <a href="#">{{$list->name}}</a></td>
                                    <td class="text-center show-branch" data-name="{{$list->name}}"
                                                                        data-state_registration="{{$list->state_registration}}"
                                                                        data-full_address="{{$list->full_address}}"
                                                                        data-cnpj="{{$list->cnpj}}" width="20%">
                                                                        {{$list->state_registration}}</td>
                                        <td class="text-center show-branch" data-name="{{$list->name}}"
                                                                        data-state_registration="{{$list->state_registration}}"
                                                                        data-full_address="{{$list->full_address}}"
                                                                        data-cnpj="{{$list->cnpj}}" width="20%">
                                                                        {{$list->cnpj}}</td>
                                    <td class="text-center" width="10%">
                                        <button class="edit-branch" data-id="{{$list->id}}">
                                                                   <i class="fas fa-pen-square" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="text-center" width="10%">
                                        <button class="remove-branch" data-id="{{$list->id}}" 
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
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="name">Nome</label>
                          <input type="text" class="form-control" id="name" name="name" disabled>
                       </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                          <label for="full_address">Endereço Completo</label>
                          <input type="text" class="form-control" id="full_address" name="full_address" disabled>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="state_registration">Registro Estadual</label>
                          <input type="text" class="form-control" id="state_registration" name="state_registration" disabled>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="cnpj">CNPJ</label>
                          <input type="text" class="form-control" id="cnpj" name="cnpj" disabled>
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
            $('#tableBranches').DataTable({
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

        $(document).on('click','#btn-new-branch',function(e){
                e.preventDefault();
                window.location.replace("/branches/create/");
        });

        $(document).on('click','.edit-branch',function(e){
                e.preventDefault();
                var id = $(this).data('id');
                window.location.replace("/branches/"+id+"/edit");
        });

        $(document).on('click','.show-branch',function(e){
                e.preventDefault();
                var name = $(this).data('name');
                var state_registration = $(this).data('state_registration');
                var full_address = $(this).data('full_address');
                var cnpj = $(this).data('cnpj');
                $('.modal-title').text("Filial");
                $("#name").val(name);
                $("#state_registration").val(state_registration);
                $("#full_address").val(full_address);
                $("#cnpj").val(cnpj);
                $('#show').modal('show');
        });

        $(document).on('click','.remove-branch',function(e){
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
                        url: "branches/" + id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id' : id,
                        },
                        success: function() {
                            swal({
                                title: "Pronto, aperte OK para atualizar a página!",
                                text: "Filial removida com sucesso.",
                                icon: "success",
                            })
                                .then((value) => {
                                    location.reload();
                                });
                        },
                        error: function(data) {
                            var erro = "Erro ao excluir filial";
                            swal("Erro",erro, "error");
                        },
                    })
                
                } else {
                    swal("Cancelado!","Operação cancelada com sucesso!","info");
                }
          });   
    
    </script>
@stop
