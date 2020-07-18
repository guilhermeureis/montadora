@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Principal</h1>
@stop

@section('content')
    <p>Bem vindo, {{Auth::user()->name}}.</p>
@stop

