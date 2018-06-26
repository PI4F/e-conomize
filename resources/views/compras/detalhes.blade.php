@extends('templates.app')
@section('title', 'Detalhes da compra '.$compra->nome)
@section('content')

<script type="text/javascript">
	function adicionar_item(produto_id){
		var url = window.location.href;
		var url_split = url.split('/');
		var compra_id = url_split[url_split.length-1];

		var url = '{{ url("/precos/gravar") }}';
		var token = '{{ csrf_token() }}';
		var valores = '_token=' + token + '&compra_id=' + compra_id + '&produto_id=' + produto_id + '&qnt=0&valor=0';

		$.ajax({
	        url: url,
	        type: 'POST',
	        data: valores,
	        success: function(retorno){ //'retorno' é o return da página PHP que recebe o POST através de um ECHO
	            window.load_dados('_token={{ csrf_token() }}', '{{ url("/compras/itens/$compra->compra_id") }}', '#itens_compra');
	        }
	    });
	}

	function remover_item(preco_id){
		var url = '{{ url("/precos/excluir") }}/' + preco_id;
		var token = '{{ csrf_token() }}';

		$.ajax({
	        url: url,
	        type: 'GET',
	        success: function(retorno){ //'retorno' é o return da página PHP que recebe o POST através de um ECHO
	            window.load_dados('_token={{ csrf_token() }}', '{{ url("/compras/itens/$compra->compra_id") }}', '#itens_compra');
	        }
	    });
	}

	$(document).ready(function(){

	    var valores = $('#form_pesquisa').serialize();
	    load_dados(valores, '{{ url("/produtos/pesquisa") }}', '#MostraPesq');
	    load_dados('_token={{ csrf_token() }}', '{{ url("/compras/itens/$compra->compra_id") }}', '#itens_compra');

	    $('#pesquisa_produto').keyup(function(){
            
            var valores = $('#form_pesquisa').serialize();//o serialize retorna uma string pronta para ser enviada
            
            //pegando o valor do campo #pesquisa
            var $parametro = $('#pesquisa_produto').val();
            
            if($parametro.length >= 1){
                console.log($parametro);
                load_dados(valores, '{{ url("/produtos/pesquisa") }}', '#MostraPesq');
            }else{
                load_dados(valores, '{{ url("/produtos/pesquisa") }}', '#MostraPesq');
            }
        });
    });
</script>

<p>{{ $compra->nome }}</p>
<span id="compra_id">
<p>Lugar: {{ $compra->lugar->nome }}</p>
<p class="filtro-info">[Pesquisa rápida de produto]<br>
Uma vez o produto encontrado e selecionado, deverá ser possível adicionar o preço e quantidade<br>
Ao termino da insersão dos valores (preços), deverá ser possível passar para outra página para ver onde é o local onde a compra ficará mais barata.</p>

<div class="row">
	<div class="col-md-6" style="overflow-y: auto">
		<div id="itens_compra"></div>
	</div>
	<div class="col-md-6">
		<form name="form_pesquisa" id="form_pesquisa" method="post" action="">
			{{ csrf_field() }}
			<input name="pagina_origem" value="compras_produtos" type="hidden">
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1"><span class="oi oi-magnifying-glass"></span></span>
			  </div>
			  <input type="text" id="pesquisa_produto" name="pesquisa_produto" class="form-control" placeholder="Digite o nome do produto" aria-label="Pesquise pelo produto" aria-describedby="basic-addon1">
			</div>
		</form>
		<div id="MostraPesq"></div>	
	</div>
</div>

@endsection