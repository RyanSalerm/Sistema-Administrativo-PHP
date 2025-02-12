@extends('adminlte::page')

@section('title', 'Editar Usuário')

@section('content_header')
<h1>Editar Usuário</h1>
@stop

@section('content')
@include('_mensagens') <!-- Mensagem de sucesso ou erro -->


<form action="{{ route('usuarios.update', $usuario) }}" method="POST">
    @method('PUT') <!-- Indica que é uma requisição PUT -->
    @csrf <!-- Protege contra ataques CSRF -->
    @include('usuarios.formulario')
</form>
@stop