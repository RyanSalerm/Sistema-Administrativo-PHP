@extends('adminlte::page')

@section('title', 'Editar Serviço')

@section('content_header')
    <h1>Editar Serviço</h1>
@stop

@section('content')
    @include('_mensagens') <!-- Mensagem de sucesso ou erro -->


    <form action="{{ route('servicos.update', $servico) }}" method="POST">
        @method('PUT') <!-- Indica que é uma requisição PUT -->
        @csrf <!-- Protege contra ataques CSRF -->
        @include('servicos.formulario')
    </form>
@stop