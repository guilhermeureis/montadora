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
                                    <td width="40%">{{$list->name}}</td>
                                    <td class="text-center" width="20%">{{$list->state_registration}}</td>
                                    <td class="text-center" width="20%">{{$list->cnpj}}</td>
                                    <td class="text-center" width="10%">
                                        <button class="edit-branch" data-id="{{$list->id}}" 
                                                                   data-name="{{$list->name}}"
                                                                   data-full_address="{{$list->full_address}}"
                                                                   data-state_registration="{{$list->state_registration}}"
                                                                   data-cnpj="{{$list->cnpj}}">
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

    
    
    </script>
@stop
