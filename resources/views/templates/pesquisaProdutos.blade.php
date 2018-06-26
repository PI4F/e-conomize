<div style="overflow-y: auto">
	<table class="table table-sm table-hover">
		<tbody>
			@foreach($produtos as $produto)
			<tr>
				<td>{{ $produto->nome }}</td>
				<td>{{ $produto->marca->nome }}</td>
				<td><button onclick="adicionar_item({{ $produto->produto_id }})" class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Adicionar na compra" style="float: right;"><span class="oi oi-plus"></span></button></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>