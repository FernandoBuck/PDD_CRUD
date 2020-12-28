<?php 
	session_start();
	
	require_once "database-entity.php";
	$connect = new Database();
	
	
	//connect-> deleteCliente('123456');
	//$connect-> deleteEndereco('8');
	//$connect-> deleteUsuario('2');
	
	

		include_once "header.php";
		include_once "login_holder.php";
		
		
		if(!empty($_POST['login'])){

			$login = $_POST['login'];
			$senha = $_POST['senha'];

			if ($connect->verificaLogin($login, $senha)) {
				header("Location: index_logado.php");
				exit();
			}else{
				echo "Login e/ou senha inválidos.";
				exit();
			}
			
		}	
			
		
		

		include_once "footer.php";

	?>

