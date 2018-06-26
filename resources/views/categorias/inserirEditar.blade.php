@extends('templates.app')
@section('title', !is_null($categoria) ? 'Editar categoria' : 'Inserir categoria')
@section('content')

<form class="quickform" id="categoriaForm" action="{{ !is_null($categoria) ? url('categorias/update') : url('categorias/gravar') }}" method="POST">
	{{ csrf_field() }}
	<h1 style="text-align: center">{{ !is_null($categoria) ? 'Editar' : 'Inserir' }} categoria</h1>
	<fieldset>
	    <legend>INSIRA OS DADOS</legend>
	    <label><input type="hidden" name="nome_do_form" value="categoria"></label>
	    <label><input type="hidden" name="categoria_produto_id" value="{{ !is_null($categoria) ? $categoria->categoria_produto_id : '' }}"></label>
	    <label><input type="hidden" name="acao" value="{{ !is_null($categoria) ? 'editar' : 'inserir' }}"></label>
	    <table id="form">
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Nome da categoria: </label>
	        		</td>
	        		<td>
	        			<input name="nome" id="nome" type="text" value="{{ !is_null($categoria) ? $categoria->nome : old('nome') }}" placeholder="Ex.: Churrasco">
	        		</td>
	        	</tr>
		    </tbody>
	    </table>
    </fieldset>
    <table class="status">
    	<tbody>
    		<tr>
    			<td>
    				<input class="btn btn-primary" type="submit" value="Enviar">
    			</td>
    			<td>
    				<div class="load" id="load_preco" style="display: none;">
    					<img src="loading.gif">
    				</div>
    			</td>
    		</tr>
    	</tbody>
    </table>
</form>
@endsection