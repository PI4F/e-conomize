@extends('templates.app')
@section('title', !is_null($lugar) ? 'Editar lugar' : 'Inserir lugar')
@section('content')

<form class="quickform" id="lugarForm" action="{{ !is_null($lugar) ? url('lugares/update') : url('lugares/gravar') }}" method="POST">
	{{ csrf_field() }}
	<h1 style="text-align: center">{{ !is_null($lugar) ? 'Editar' : 'Inserir' }} lugar</h1>
	<fieldset>
	    <legend>INSIRA OS DADOS</legend>
	    <label><input type="hidden" name="nome_do_form" value="lugar"></label>
	    <label><input type="hidden" name="lugar_id" value="{{ !is_null($lugar) ? $lugar->lugar_id : '' }}"></label>
	    <label><input type="hidden" name="acao" value="{{ !is_null($lugar) ? 'editar' : 'inserir' }}"></label>
	    <table id="form">
	        <tbody>
	        	<tr>
	        		<td>
	        			<label>Nome do lugar: </label>
	        		</td>
	        		<td>
	        			<input name="nome" id="nome" type="text" value="{{ !is_null($lugar) ? $lugar->nome : old('nome') }}" placeholder="Ex.: Extra Abolição">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Endereço: </label>
	        		</td>
	        		<td>
	        			<input name="endereco" id="endereco" type="text" value="{{ !is_null($lugar) ? $lugar->endereco : old('endereco') }}" placeholder="Ex.: Rua dos Bobos, Nº 0 - Jd. Tal">
	        		</td>
	        	</tr>
	        	<tr>
	        		<td>
	        			<label>Fechado: </label>
	        		</td>
	        		<td>
	        			@if(!is_null($lugar))
	        				<input name="fechado" type="checkbox" value=1 {{ $lugar->fechado ? 'checked' : '' }}>
	        			@else
	        				<input name="fechado" type="checkbox" value=1>
        				@endif
	        		</td>
	        	</tr>
		    </tbody>
	    </table>
    </fieldset>

    <div id="MostraPesq"></div>

    <table class="status">
    	<tbody>
    		<tr>
    			<td>
    				<input class="btn btn-primary" type="submit" value="Enviar">
    			</td>
    			<td>
    				<div class="load" id="load_preco" style="display: none;">
    					<!--<img src="loading.gif">-->
    				</div>
    			</td>
    		</tr>
    	</tbody>
    </table>
</form>
@endsection