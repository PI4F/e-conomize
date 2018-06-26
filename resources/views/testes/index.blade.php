@extends('templates.app')
@section('title', 'TESTE')
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

<form class="quickform" id="precoForm" action="{{ url('TEMPLATE/gravar') }}" method="POST">
	{{ csrf_field() }}
	<h1 style="text-align: center">Inserir preço</h1>
	<fieldset>
	    <legend>INSIRA OS DADOS</legend>
	    <label><input type="hidden" name="nome_do_form" value="preco"></label>
	    <label><input type="hidden" name="id" value=""></label>
	    <label><input type="hidden" name="acao" value="inserir"></label>
	    <table id="form">
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Compra: </label>
	        		</td>
	        		<td>
	        			<select id="compraID" name="compraID">
	        				<option value="">--</option>
	        				@foreach($compras as $compra)
	        					<option value="{{ $compra->compra_id }}">{{ $compra->nome }}</option>
	        				@endforeach
	        			</select> - 
	        			<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#window_compra" id="btnAdd_compraID" onclick="show_diag('window_compra')">
	        				Adicionar
	        			</button>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Produto: </label>
	        		</td>
	        		<td>
	        			<select id="produtoID" name="produtoID">
	        				<option value="">--</option>
	        				@foreach($produtos as $produto)
	        					<option value="{{ $produto->produto_id }}">{{ $produto->nome }}</option>
	        				@endforeach
	        			</select> - <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#window_produto" id="btnAdd_produtoID" onclick="show_diag('window_produto')">Adicionar</button>
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
	        			<label>Quatidade: </label>
	        		</td>
	        		<td>
	        			<input name="qnt" type="text" placeholder="Ex.: 0,685" maxlength="5" size="10">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Promoção: </label>
	        		</td>
	        		<td>
	        			<select name="promocao" id="promocao" onchange="Mostrar_x(this,'prom_cmp')">
		                    <option value="0">Não</option>
		                    <option value="1">Sim</option>
		                </select>
		            </td>
		        </tr>
		    </tbody>
		</table>
	</fieldset>
	<br/>
	<fieldset id="prom_cmp" style="display: none">
        <legend>PROMOÇÃO</legend>
        <table>
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Tipo de promoção: 
				            <select name="promocaoID" id="promocaoID">
					            <option value="">--</option>
					            <option value="1">De X por Y</option>
					            <option value="2">Leve X e pague Y</option>
					            <option value="3">Desconto no clube/cartão do lugar</option>
					            <option value="4">Desconto na 2ª unidade</option>
					            <option value="5">Após X uni cada um sai por Y</option>
					        </select>
					    </label>
					</td>
				</tr>
		        <tr>
		        	<td>
		        		<label id="label_valor1" style="display: none">
		        			<span id="valor1">Valor 1: </span><input type="text" size="5" name="valor1"> <span id="pos"></span>
		        		</label>
		        	</td>
		        </tr>
		        <tr>
		        	<td>
		        		<label id="label_valor2" style="display: none">
		        			<span id="valor2">Valor 2: </span><input type="text" size="5" name="valor2">
		        		</label>
		        	</td>
		        </tr>
		        <!--<label><input type="radio" name="tipo" id="outro_val" onclick="val_radio('outro_val','tipo_outro');">Outro: </label>
		        <input type="text" name="tipo" id="tipo_outro" disabled><br />-->
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