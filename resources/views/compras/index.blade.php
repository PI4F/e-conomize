@extends('templates.app')
@section('title', 'Compras')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-2"><h3><span class="oi oi-list"></span> Compras</h3></div>
        <div class="col-sm-2"><a href="{{ url('/compras/inserir') }}" class="btn btn-primary">Adicionar nova compra</a></div>
    </div>
    <br>
    <div class="filtro-info">
        @if(!is_null($filtro))
            Mostrando os preços de: <strong>{{ $compras[0]->lugar->nome }}</strong>
            <p>{{ $filtro }}</p>
            <a href="{{ url('/compras') }}" class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Limpar filtro"><span class="oi oi-trash"></span></a>
        @endif
    </div>
    <div class="row">
@foreach($compras as $compra)
    <div class="col-sm-4">
        <div class="card bg-light">
            <div class="card-header">
                <span style="font-size: 20px"><strong>{{ $compra->nome }}</strong></span>
            </div>
            <div class="card-body">
                <p><strong>Lugar:</strong> {{ $compra->lugar->nome }}</p>
                <p><strong>Valor total:</strong> {{ formatPrice($compra->valorTotal()) }}</p>
                <p><strong>Produtos:</strong></p>
                <ul>
                @foreach($compra->precos as $preco)
                    <li>
                        {{ $preco->produto->nome }}
                    </li>
                @endforeach
                </ul>
                <p>
                    <div class="btn-group" role="group">
                        <a href='{{ url("/compras/excluir/$compra->compra_id") }}' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a>
                        <a href='{{ url("/compras/detalhes/$compra->compra_id") }}' class="btn btn-primary btn-sm">Ver detalhes</a>
                    </div>
                </p>
            </div>
        </div>
    </div>
@endforeach
    </div>
</div>
@endsection