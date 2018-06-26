@extends('templates.app')
@section('title', 'Lugares')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-2"><h3><span class="oi oi-dollar"></span> Preços</h3></div>
        <div class="col-sm-2"><a href="{{ url('/precos/inserir') }}" class="btn btn-primary">Adicionar novo preço</a></div>
    </div>
    <div class="filtro-info">
        @if(!is_null($filtro))
            Mostrando os preços de: <strong>{{ $precos[0]->lugar->nome }}</strong>
            <a href="{{ url('/precos') }}" class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Limpar filtro"><span class="oi oi-trash"></span></a>
        @endif
    </div>
    <div class="row">
    @foreach($precos as $preco)
        <div class="col-md-3">
            <div class="card bg-light">
                <div class="card-header">
                    <p><span style="font-size: 22px"><strong>{{ $preco->produto->nome }}</strong></span></p>
                </div>
                <div class="card-body">
                    <p><strong>Preço:</strong> {{ formatPrice($preco->valor) }}</p>
                    <p><strong>Quantidade:</strong> {{ formatWeight($preco->qnt) }}</p>
                    <div class="btn-group" role="group">
                        <a href="" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a> <a href="" class="btn btn-primary btn-sm">Ver detalhes</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection