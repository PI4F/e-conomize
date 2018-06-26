@extends('templates.app')
@section('title', 'Marcas')
@section('content')
<style type="text/css">
    .marca-fechado{
        color: gray;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-2"><h3><span class="oi oi-star"></span> Marcas</h3></div>
        <div class="col-sm-2"><a href="{{ url('/marcas/inserir') }}" class="btn btn-primary">Adicionar nova marca</a></div>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Produtos</th>
                <th scope="col">Ações</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($marcas as $marca)
                <tr class="{{ $marca->fechado ? 'marca-fechado' : '' }}">
                    <td>
                        {{ $marca->nome }}
                    </td>
                    <td>
                        @if(count($marca->produtos)>0)
                            <a href='{{ url("/produtos/marca/$marca->marca_produto_id") }}'>{{ count($marca->produtos) }}</a>
                        @else
                            NENHUM
                        @endif
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href='{{ url("/marcas/$marca->marca_id/editar") }}' class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><span class="oi oi-pencil"></span></a>
                            <a href='{{ url("/marcas/$marca->marca_id/excluir") }}' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection