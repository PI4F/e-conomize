@extends('templates.app')
@section('title', 'Inserir produtos')
@section('content')

<script>
    $(document).ready(function(){
	    $("#preco").inputmask('decimal', {
	                'alias': 'numeric',
	                'groupSeparator': ',',
	                'autoGroup': true,
	                'digits': 2,
	                'radixPoint': ",",
	                'digitsOptional': false,
	                'allowMinus': false,
	                'prefix': '',
	                'placeholder': '0'
	    });
	});
</script>

<form class="quickform" id="precoForm" action="{{ url('produtos/gravar') }}" method="POST">
	{{ csrf_field() }}
	<h1 style="text-align: center">Inserir produto</h1>
	<fieldset>
	    <legend>INSIRA OS DADOS</legend>
	    <label><input type="hidden" name="nome_do_form" value="produtos"></label>
	    <label><input type="hidden" name="produto_id" value=""></label>
	    <label><input type="hidden" name="acao" value="inserir"></label>
	    <table id="form">
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Nome do produto: </label>
	        		</td>
	        		<td>
	        			<input name="nome" id="nome" type="text" placeholder="Ex.: Bolacha Trakinas Morango 60g">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Categoria: </label>
	        		</td>
	        		<td>
	        			<select id="categoria_produto_id" name="categoria_produto_id">
	        				<option value="">--</option>
	        				@foreach($categorias as $categoria)
	        					<optgroup label="{{ $categoria->nome }}">
	        						@if(count($categoria->subcategorias)==0)
	        							<option disabled>NENHUMA</option>
	        						@else
		        						@foreach($categoria->subcategorias as $subcategoria)
		        							<option value="{{ $subcategoria->subcategoria_produto_id }}">{{ $subcategoria->nome }}</option>
		        						@endforeach
	        						@endif
	        					</optgroup>
	        				@endforeach
	        			</select> - <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#window_categoria" id="btnAdd_categoria_id" onclick="show_diag('window_categoria')">Adicionar</button>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Marca: </label>
	        		</td>
	        		<td>
	        			<select id="marca_produto_id" name="marca_produto_id">
	        				<option value="">--</option>
	        				@foreach($marcas as $marca)
	        					<option value="{{ $marca->nome }}">{{ $marca->nome }}</option>
	        				@endforeach
	        			</select> - <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#window_marca" id="btnAdd_marca_id" onclick="show_diag('window_marca')">Adicionar</button>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Medida principal: </label>
	        		</td>
	        		<td>
	        			<input name="medida_produto_base1" id="medida_produto_base1" type="text" placeholder="Ex.: 0,685">
	        			<select id="tipo_medida_produto_base1_id" name="tipo_medida_produto_base1_id">
	        				<option value="">--</option>
	        				@foreach($medidas as $medida)
	        					<option value="{{ $medida->sigla }}">{{ $medida->sigla }}</option>
	        				@endforeach
	        			</select>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Medida secundária: </label>
	        		</td>
	        		<td>
	        			<input name="medida_produto_base2" id="medida_produto_base2" type="text" placeholder="Ex.: 0,685">
	        			<select id="tipo_medida_produto_base2_id" name="tipo_medida_produto_base2_id">
	        				<option value="">--</option>
	        				@foreach($medidas as $medida)
	        					<option value="{{ $medida->sigla }}">{{ $medida->sigla }}</option>
	        				@endforeach
	        			</select>
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