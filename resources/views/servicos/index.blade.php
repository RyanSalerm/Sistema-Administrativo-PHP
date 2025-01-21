@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
{{ config('adminlte.title') }}
@hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    <h1>Lista de Serviços</h1>
@stop

{{-- Rename section content to content_body --}}

@section('content')
    {{--@include('_mensagens_sessao')--}}

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">nome</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($servicos as $servico)
                <tr>
                    <th>{{ $servico->id }}</th>
                    <td>{{ $servico->nome }}</td>
                    <td>
                        <a href="{{ route('servicos.edit', $servico) }}" class="btn btn-primary">Atualizar</a>
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
        {{ $servicos->links() }}
    </div>

    <div class="float-right">
        <a href="{{ route('servicos.create') }}" class="btn btn-success">Novo Serviço</a>
    </div>
@stop

{{-- Create a common footer --}}

@section('footer')
<div class="float-right">
    Version: {{ config('app.version', '1.0.0') }}
</div>

<strong>
    <a href="{{ config('app.company_url', '#') }}">
        {{ config('app.company_name', 'My company') }}
    </a>
</strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script>

        $(document).ready(function () {
            // Add your common script logic here...
        });

    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    <style type="text/css">
        {
                {
                -- You can add AdminLTE customizations here --
            }
        }

        /*
        .card-header {
            border-bottom: none;
        }
        .card-title {
            font-weight: 600;
        }
        */
    </style>
@endpush