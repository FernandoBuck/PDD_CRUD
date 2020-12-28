<?php 
	session_start();
	
	require_once "database-entity.php";
	$connect = new Database();

	include_once "header.php";
	//include_once "logout.php";


	if (isset($_GET['acao'])) {
		switch ($_GET['acao']) {
		case 'editar':
			include_once "include_editar_cliente.php";
			include_once "include_tabela_enderecos.php";	
			break;

		case 'editar_end':
			include_once "include_editar_endereco.php";
			include_once "include_tabela_enderecos.php";	
			break;

		case 'adicionar_endereco':
			include_once "include_adicionar_endereco.php";
			include_once "include_tabela_enderecos.php";
			break;
		
		default:
			include_once "include_cadastro.php";
			include_once "include_tabela_clientes.php";	
			break;
		}
	}else{
		include_once "include_cadastro.php";
		include_once "include_tabela_clientes.php";
	}


	
	include_once "footer.php";
	include_once "logout.php";
	
?>