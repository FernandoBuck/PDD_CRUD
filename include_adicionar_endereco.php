<?php 
	$dados = $connect->buscaClienteRG($_GET["rgedt"]);
	//$dados_end = $connect->buscaEnderecosRG($_GET["rgedt"])[$_GET["endedt"]];

?>

<section class="formulario">
	<form method="POST">
		

		<h3>Cadastro de Endereço:</h3></br>
		<label>Logradouro:</label>
		<input type="text" name="logradouro" placeholder="Logradouro" required>
		<label>Bairro:</label>
		<input type="text" name="bairro" placeholder="Bairro" required>
		<label>Cidade:</label>
		<input type="text" name="cidade" placeholder="Cidade" required>
		<label>Estado:</label>
		<input type="text" name="estado" placeholder="Estado" required>
		<label>CEP:</label>
		<input type="number" name="cep" placeholder="CEP" required>
		<label>Complemento:</label>
		<input type="text" name="complemento" placeholder="Complemento">

		<br><br>	
		<input type="submit" name="enviar" value="ADICIONAR" onclick="">
	</form>
	<button><a href="index_logado.php?rgedt=<?php echo $_GET['rgedt']; ?>&acao=editar">Voltar</a></button>
</section>

<?php 
		//Verifica se o campo RG foi preenchido
		if(!empty($_POST['logradouro'])){

			$logradouro = $_POST['logradouro'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			$complemento = $_POST['complemento'];
			
			//Chama a função de insetir cliente e endereco no banco de dados com os dados do formulário
			$connect->insertEndereco($_GET["rgedt"], $logradouro, $bairro, $cidade, $estado, $cep, $complemento);

			
			}
			

	?>