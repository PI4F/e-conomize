@extends('templates.app')
@section('title', 'Produtos')
@section('content')

<?php

function decimalPlaces($num){
    echo '<script>console.log("=================")</script>';
    $num = floatval(strval($num));
    echo '<script>console.log("NUM: '.$num.'")</script>';
    for ($i=0; $i<5; $i++){
        $pow = pow(10, $i);
        echo '<script>console.log("POW: '.$pow.'")</script>';
        $multi = $pow * $num;
        echo '<script>console.log("M: '.$multi.'")</script>';
        $res = fmod($multi, 1);
        echo '<script>console.log("RES: '.$res.'")</script>';
        if ($res == 0){
            return $i;
        }
    }
    return 4;
}

function formatPrice($num){
    if($num == 0){
        return 0;
    }else{
        return 'R$ '.number_format($num, 2, ',', ' ');
    }
}
function formatWeight($num){
    if($num == 0){
        return 0;
    }elseif ($num == round($num)) {
        return round($num);
    }else{
        return number_format($num, 4, ',', ' ');
    }
}
?>

<style type="text/css">
    .produto-fechado{
        color: gray;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-2"><h3><span class="oi oi-basket"></span> Produtos</h3></div>
        <div class="col-sm-2"><a href="{{ url('/produtos/inserir') }}" class="btn btn-primary">Adicionar novo produto</a></div>
    </div>
    <br>
    <div class="filtro-info">
        @if(!is_null($filtro))
            Mostrando os produtos da marca: <strong>{{ $produtos[0]->marca->nome }}</strong>
            <a href="{{ url('/produtos') }}" class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="Limpar filtro"><span class="oi oi-trash"></span></a>
        @endif
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoria</th>
                <th scope="col">Preços</th>
                <th scope="col">Último preço registrado</th>
                <th scope="col">Ações</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>
                        {{ $produto->nome }}
                    </td>
                    <td>
                        <a href='{{ url("/marcas/".$produto->marca->nome) }}'>{{ $produto->marca->nome }}</a>
                    </td>
                    <td>
                        <a
                         href='{{ url("/produtos/categoria/".$produto->subcategoria->categoria->nome) }}'
                         data-toggle="tooltip"
                         data-placement="top"
                         title="Ver produtos dessa categoria"
                        >
                            {{ $produto->subcategoria->categoria->nome }}
                        </a>
                         > 
                        <a
                         href='{{ url("/produtos/subcategoria/".$produto->subcategoria->nome) }}'
                         data-toggle="tooltip"
                         data-placement="top"
                         title="Ver produtos dessa subcategoria"
                        >
                            {{ $produto->subcategoria->nome }}
                        </a>
                    </td>
                    <td>
                        @if(count($produto->precos)>0)
                            <a href='{{ url("/precos/produto/".$produto->produto_id) }}'>{{ count($produto->precos) }}</a>
                        @else
                            NENHUM
                        @endif
                    </td>
                    <td>
                        {{ formatPrice($produto->precos[0]->valor) }} 
                        (<a
                         href='{{ url("/lugares/".$produto->precos[0]->lugar->lugar_id) }}'
                         data-toggle="tooltip"
                         data-placement="top"
                         title="Ver detalhes sobre o local"
                        >
                            {{ $produto->precos[0]->lugar->nome }}
                        </a>)
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href='{{ url("/produtos/".$produto->produto_id."/editar") }}' class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><span class="oi oi-pencil"></span></a>
                            <a href='{{ url("/produtos/$produto->produto_id/excluir") }}' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection