@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
<h1>Novo Usuários</h1>
@stop
@section('content')
@include('_mensagens')
<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    @include('usuarios.formulario')
</form>
@stop