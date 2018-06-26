@extends('templates.app')
@section('title', 'Inserir preços')
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

<form class="quickform" id="precoForm" action="{{ url('precos/gravar') }}" method="POST">
	{{ csrf_field() }}
	<h1 style="text-align: center">Inserir preço</h1>
	<fieldset>
	    <legend>INSIRA OS DADOS</legend>
	    <label><input type="hidden" name="nome_do_form" value="preco"></label>
	    <label><input type="hidden" name="preco_id" value=""></label>
	    <label><input type="hidden" name="acao" value="inserir"></label>
	    <table id="form">
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Compra: </label>
	        		</td>
	        		<td>
	        			<select id="compra_id" name="compra_id">
	        				<option value="">--</option>
	        				@foreach($compras as $compra)
	        					<option value="{{ $compra->compra_id }}">{{ $compra->nome }}</option>
	        				@endforeach
	        			</select> - 
	        			<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#window_compra" id="btnAdd_compra_id" onclick="show_diag('window_compra')">
	        				Adicionar
	        			</button>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Produto: </label>
	        		</td>
	        		<td>
	        			<select id="produto_id" name="produto_id">
	        				<option value="">--</option>
	        				@foreach($produtos as $produto)
	        					<option value="{{ $produto->produto_id }}">{{ $produto->nome }}</option>
	        				@endforeach
	        			</select> - <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#window_produto" id="btnAdd_produto_id" onclick="show_diag('window_produto')">Adicionar</button>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Preço: </label>
	        		</td>
	        		<td>
	        			<input name="preco" id="preco" type="text" placeholder="Ex.: 10,00">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Quantidade: </label>
	        		</td>
	        		<td>
	        			<input name="qnt" type="text" placeholder="Ex.: 0,685" maxlength="5" size="10">
	        		</td>
	        	</tr>
		    </tbody>
		</table>
	</fieldset>
	<br/>
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