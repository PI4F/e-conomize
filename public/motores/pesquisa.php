<!DOCTYPE html>
<html lang="pt-br">
    <head>
	<meta charset="UTF-8">
<?php
	//recebemos nossos parâmetros vindos do form
	$parametro = isset($_POST['pesquisa']) ? $_POST['pesquisa'] : null;
	$valor     = isset($_POST[$parametro]) ? $_POST[$parametro] : null;
	$origem    = isset($_POST['pagina_origem']) ? $_POST['pagina_origem'] : null;

	/*== Colocando uma forma de filtrar qual o tipo de pesquisa: CLIENTES ou SERVIÇOS ==*/

	switch ($origem) {
/**/	case 'clientes':
			$msg = "";
			//começamos a concatenar nossa tabela
			$msg .="<table class='table table-hover'";
			$msg .="	<thead>";
			$msg .="		<tr>";
			$msg .="			<th>Nome</th>";
			$msg .="			<th>CPF</th>";
			$msg .="			<th>Telefones</th>";
			$msg .="			<th>E-mail</th>";
			$msg .="			<th>Qnt OS</th>";
			$msg .="			<th>Ultima OS</th>";
			$msg .="		</tr>";
			$msg .="	</thead>";
			$msg .="	<tbody>";
						
						//requerimos a classe de conexão
						require_once('../DB/connect.php');
						require_once('../DB/DBconfig.php');
						require_once('../DB/query.php');
						require_once('os.php');
							
							switch($parametro){
								case 'nome':
									$resultado = DBLer("cliente","WHERE (nome LIKE '%".$valor."%' or sobrenome LIKE '%".$valor."%') ORDER BY nome ASC");
									break;
								case 'cpf_cnpj':
									$resultado = DBLer("cliente","WHERE cpf_cnpj LIKE '%".$valor."%' ORDER BY nome ASC");
									break;
								case 'telefone':
									$resultado = DBLer("cliente","WHERE (fone1 LIKE '%".$valor."%' or fone2 LIKE '%".$valor."%') ORDER BY nome ASC");
									break;
								case 'email':
									$resultado = DBLer("cliente","WHERE email LIKE '%".$valor."%' ORDER BY nome ASC");
									break;
								default:
									$resultado = DBLer("cliente","ORDER BY nome ASC");
							}
									
								//resgata os dados na tabela
								if($resultado!=false){
									foreach ($resultado as $res) {

									$qnt_os         = DBLer("os","WHERE cliente_id = ".$res['id'],"COUNT(*)");
									$ultimaOS       = DBLer('os','WHERE cliente_id = '.$res['id'],'MAX(os_num)');
									$ultimaOS_num   = $ultimaOS[0]['MAX(os_num)'];
									$ultimaOS_link  = "<a href='servicos.php?modo=os_completa&os=";
									$ultimaOS_link .= $ultimaOS_num!==null ? $ultimaOS_num : '0';
									$ultimaOS_link .= "'>".$ultimaOS_num;
									$ultimaOS_txt   = $ultimaOS_num!==null ? $ultimaOS_link."</a>" : 'NENHUMA';

			$msg .="				<tr>";
			$msg .="					<td><a href='clientes.php?modo=dados_completos&cliente_id=".$res['id']."'>".$res['nome']." ".$res['sobrenome']."</a></td>";
			$msg .="					<td>".formatarInfo($res['cpf_cnpj'],'cpf_cnpj')."</td>";
			$msg .="					<td>".formatarInfo($res['fone1'],'fone')."<br/>".formatarInfo($res['fone2'],'fone')."</td>";
			$msg .="					<td>".$res['email']."</td>";
			$msg .="					<td title='Esse é um texto gigante que eu resolvi colocar aqui só pra testar esse recurso interessante que faz com que aparece uma caixa de dica só de parar o mouse encima. Você não acha isso demais? Eu acho sensacional não ter que usar nenhum JavaScript pra poder fazer isso funcionar'><center><a href='mostrar_servicos.php?cliente_id=".$res['id']."'>".$qnt_os[0]['COUNT(*)']."</a></center></td>";
			$msg .="					<td>{$ultimaOS_txt}</td>";
			//$msg .="					<td>".var_dump($ultimaOS_link)."</td>";
			$msg .="				</tr>";
									}	
								}else{
									$msg = "";
									$msg .="Nenhum resultado foi encontrado...";
								}
			//$msg .="<hr>Parametro == ".$parametro;
			//$msg .="<br/>Valor == ".$valor;
			//$msg .="<br/>Resutado == ".var_dump($resultado);
			$msg .="	</tbody>";
			$msg .="</table>";
			//retorna a msg concatenada
			echo $msg;
			break;
		
/**/	case 'servicos':
			# code...
			break;
	}

	
?>
</head>
</html>