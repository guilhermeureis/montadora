@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Automóveis</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="class-md-4">
                    <button type="button" id="btn-new-automobile" class="btn btn-secondary"><i class="fas fa-plus" aria-hidden="true"></i> Novo Automóvel</button>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover" id="tableEmployee">
                        <thead>
                            <tr>
                                <th width="25%">Nome</th>
                                <th class="text-center" width="25%">Filial</th>
                                <th class="text-center" width="15%">Nº Chassi</th>
                                <th class="text-center" width="15%">Categoria</th>
                                <th class="text-center" width="10%">Editar</th>
                                <th class="text-center" width="10%">Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($automobiles as $list)
                                <tr>                                   
                                    <td width="25%" class="show-automobile" data-name="{{$list->name}}"
                                                                            data-branch="{{$list->branch->name}}"
                                                                            data-year="{{$list->year}}"
                                                                            data-model="{{$list->model}}"
                                                                            data-color="{{$list->color}}"
                                                                            data-chassi_number="{{$list->chassi_number}}"
                                                                            data-category="{{$list->category->category}}">
                                                                            <a href="#">{{$list->name}}</a></td>
                                    <td class="text-center show-automobile" width="25%" data-name="{{$list->name}}"
                                                                        data-branch="{{$list->branch->name}}"
                                                                        data-year="{{$list->year}}"
                                                                        data-model="{{$list->model}}"
                                                                        data-color="{{$list->color}}"
                                                                        data-chassi_number="{{$list->chassi_number}}"
                                                                        data-category="{{$list->category->category}}"
                                                                        >{{$list->branch->name}}</td>
                                    <td class="text-center show-automobile" width="15%" data-name="{{$list->name}}"
                                                                        data-branch="{{$list->branch->name}}"
                                                                        data-year="{{$list->year}}"
                                                                        data-model="{{$list->model}}"
                                                                        data-color="{{$list->color}}"
                                                                        data-chassi_number="{{$list->chassi_number}}"
                                                                        data-category="{{$list->category->category}}"
                                                                        >{{$list->chassi_number}}</td>
                                    <th class="text-center show-automobile" width="15%" data-name="{{$list->name}}"
                                                                        data-branch="{{$list->branch->name}}"
                                                                        data-year="{{$list->year}}"
                                                                        data-model="{{$list->model}}"
                                                                        data-color="{{$list->color}}"
                                                                        data-chassi_number="{{$list->chassi_number}}"
                                                                        data-category="{{$list->category->category}}"
                                                                        >{{$list->category->category}}</th>
                                    <td class="text-center" width="10%">
                                        <button class="edit-automobile" data-id="{{$list->id}}"
                                                                    data-name="{{$list->name}}">
                                                <i class="fas fa-pen-square" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <td class="text-center" width="10%">
                                        <button class="remove-automobile" data-id="{{$list->id}}" 
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
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="name">Nome</label>
                          <input type="text" class="form-control" id="name" name="name" disabled>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Filial</label>
                        <input type="text" class="form-control" id="branch" name="branch" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="year">Ano</label>
                          <input type="number" class="form-control" id="year" name="year" disabled>
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="model">Modelo</label>
                          <input type="text" class="form-control" id="model" name="model" disabled>
                       </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="color">Cor</label>
                          <input type="text" class="form-control" id="color" name="color" disabled>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="chassi_number">Número do Chassi</label>
                          <input type="text" class="form-control" id="chassi_number" name="chassi_number" disabled>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Categoria</label>
                        <input type="text" class="form-control" id="category" name="category" disabled>
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

        $(document).on('click','#btn-new-automobile',function(e){
                e.preventDefault();
                window.location.replace("/automobiles/create");
        });

        $(document).on('click','.edit-automobile',function(e){
                e.preventDefault();
                var id = $(this).data('id');
                window.location.replace("/automobiles/"+id+"/edit");
        });

        $(document).on('click','.show-automobile',function(e){
            e.preventDefault();
            
            var name = $(this).data('name');
            var branch = $(this).data('branch');
            var year = $(this).data('year');
            var model = $(this).data('model');
            var color = $(this).data('color');
            var chassi_number = $(this).data('chassi_number');
            var category = $(this).data('category');
            
            $('.modal-title').text("Automóvel");
            $("#name").val(name);
            $("#branch").val(branch);
            $("#year").val(year);
            $("#model").val(model);
            $("#color").val(color);
            $("#chassi_number").val(chassi_number);
            $("#category").val(category);
            $('#show').modal('show');
        });

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

        $(document).on('click','.remove-automobile',function(e){
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
                        url: "automobiles/" + id,
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'id' : id,
                        },
                        success: function() {
                            swal({
                                title: "Pronto, aperte OK para atualizar a página!",
                                text: "Automóvel removido com sucesso.",
                                icon: "success",
                            })
                                .then((value) => {
                                    location.reload();
                                });
                        },
                        error: function(data) {;
                            var erro = "Erro ao excluir automóvel";
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
