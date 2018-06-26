@extends('templates.app')
@section('title', 'Lugares')
@section('content')
<style type="text/css">
    .lugar-fechado{
        color: gray;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-2"><h3><span class="oi oi-map-marker"></span> Lugares</h3></div>
        <div class="col-sm-2"><a href="{{ url('/lugares/inserir') }}" class="btn btn-primary">Adicionar novo local</a></div>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Preços</th>
                <th scope="col">Compras</th>
                <th scope="col">Ações</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($lugares as $lugar)
                <tr class="{{ $lugar->fechado ? 'lugar-fechado' : '' }}">
                    <td>
                        {{ $lugar->nome }} {{ $lugar->fechado ? '[FECHADO]' : '' }}
                    </td>
                    <td>{{ $lugar->endereco }}</td>
                    <td>
                        @if(count($lugar->precos)>0)
                            <a href='{{ url("/precos/lugar/$lugar->lugar_id") }}'>{{ count($lugar->precos) }}</a>
                        @else
                            NENHUM
                        @endif
                    </td>
                    <td>
                        @if(count($lugar->compras))
                            <a href='{{ url("/compras/lugar/$lugar->lugar_id") }}'>{{ count($lugar->compras) }}</a>
                        @else
                            NENHUMA
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href='{{ url("/lugares/$lugar->lugar_id/editar") }}' class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><span class="oi oi-pencil"></span></a>
                            <a href='{{ url("/lugares/$lugar->lugar_id/excluir") }}' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection