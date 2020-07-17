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
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                     </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label for="full_address">Endereço Completo</label>
                        <input type="text" class="form-control" id="full_address" name="full_address">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="state_registration">Registro Estadual</label>
                        <input type="text" class="form-control" id="state_registration" name="state_registration">
                     </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" id="cnpj" name="cnpj">
                     </div>
                  </div>
              </div>
          </div>
          <div class="card-footer">
             <button type="submit" class="btn btn-primary">Salvar</button>
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
 
    </script>
@stop
