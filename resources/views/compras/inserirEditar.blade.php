@extends('templates.app')
@section('title', 'Inserir preços')
@section('content')

<form class="quickform" id="compraForm" action="{{ url('compras/gravar') }}" method="POST">
	{{ csrf_field() }}
	<h1 style="text-align: center">Inserir Compra</h1>
	<fieldset>
	    <legend>INSIRA OS DADOS</legend>
	    <label><input type="hidden" name="nome_do_form" value="compra"></label>
	    <label><input type="hidden" name="compra_id" value=""></label>
	    <label><input type="hidden" name="acao" value="inserir"></label>
	    <table id="form">
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Nome da compra: </label>
	        		</td>
	        		<td>
	        			<input name="nome" id="nome" type="text" value="{{ old('nome') }}" placeholder="Ex.: Extra - Churrasco">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Lugar: </label>
	        		</td>
	        		<td>
	        			<select id="lugar_id" name="lugar_id">
	        				<option value="">--</option>
	        				@foreach($lugares as $lugar)
	        					<option value="{{ $lugar->lugar_id }}" {{ $lugar->lugar_id==old('lugar_id') ? 'selected' : '' }}>{{ $lugar->nome }}</option>
	        				@endforeach
	        			</select> - <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#div_formLugar" id="btnAdd_lugar_id">Adicionar</button>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td colspan="2">
	        			<div class="collapse" id="div_formLugar">
	        				<form class="quickform" id="lugarForm" action="" method="">
	        					[lugarForm]
	        				</form>
	        			</div>
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Data da compra: </label>
	        		</td>
	        		<td>
	        			<input name="data_compra" type="datetime-local" value="{{ date('Y-m-d\TH:i:s') }}" step="1">
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