@extends('templates.app')
@section('title', 'Categorias')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col-sm-2"><h3><span class="oi oi-tag"></span> Categorias</h3></div>
        <div class="col-sm-2"><a href="{{ url('/categorias/inserir') }}" class="btn btn-primary">Adicionar nova categoria</a></div>
    </div>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>
                            {{ $categoria->nome }} <button class="btn btn-link" data-toggle="collapse" data-target="#subcategorias_{{ $categoria->categoria_produto_id }}"><span class="oi oi-chevron-bottom"></span>
                        </button>
                        <div id="subcategorias_{{ $categoria->categoria_produto_id }}" class="collapse subcategorias">
                            <table class="table table-sm">
                                <tbody>
                                    @foreach($categoria->subcategorias as $subcategoria)
                                        <tr>
                                            <td>
                                                {{ $subcategoria->nome }}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href='{{ url("/categorias/editar/$subcategoria->subcategoria_produto_id") }}' class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><span class="oi oi-pencil"></span></a>
                                                    <a href='{{ url("/categorias/excluir/$subcategoria->subcategoria_produto_id") }}' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href='{{ url("/categorias/editar/$categoria->categoria_produto_id") }}' class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><span class="oi oi-pencil"></span></a>
                            <a href='{{ url("/categorias/excluir/$categoria->categoria_produto_id") }}' class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Excluir"><span class="oi oi-trash"></span></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection