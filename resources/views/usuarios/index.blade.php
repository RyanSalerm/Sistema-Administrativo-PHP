@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
{{ config('adminlte.title') }}
@hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
<h1>Lista de Usuários</h1>
@stop

{{-- Rename section content to content_body --}}

@section('content')
@include('_mensagens')
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ações</th>

        </tr>
    </thead>
    <tbody>
        @forelse ($usuarios as $users)
            <tr>
                <th>{{ $users->id }}</th>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    <div class="d-flex gap-3"> <!-- gap-3 adiciona mais espaço entre os botões -->
                        <a href="{{ route('usuarios.edit', $users) }}" class="btn btn-primary">Atualizar</a>

                        <form action="{{ route('usuarios.destroy', $users->id) }}" method="post"
                            onsubmit="return confirm('Tem certeza que deseja apagar?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Apagar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <th></th>
                <th>Nenhum registro foi encontrado</th>
                <th></th>
            </tr>
        @endforelse
    </tbody>


</table>

<div class="d-flex justify-content-center">
    {{ $usuarios->links() }}
</div>

<div class="float-right">
    <a href="{{ route('usuarios.create') }}" class="btn btn-success">Novo Usuário</a>
</div>
@stop