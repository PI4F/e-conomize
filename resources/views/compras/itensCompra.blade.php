<table class="table table-sm table-hover">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Produto</th>
			<th scope="col">Qnt.</th>
			<th scope="col">Preço</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		@foreach($compra->precos as $preco)
		<tr>
			<th scope="row">{{ $loop->index + 1 }}</td>
			<td>{{ $preco->produto->nome }}</td>
			<td>{{ formatWeight($preco->qnt) }}</td>
			<td>{{ formatPrice($preco->valor) }}</td>
			<td><button onclick="remover_item({{ $preco->preco_id }})" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remover item" style="float: right;"><span class="oi oi-minus"></span></button></td>
		</tr>
		@endforeach
	</tbody>
</table>