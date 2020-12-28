<?php 
	$dados = $connect->buscaClienteRG($_GET["rgedt"]);

?>

<section class="formulario">
	<form method="POST">
		<h3>Informações do Cliente:</h3></br>
		<label>Nome:</label>
		<input type="text" name="nome" value="<?php echo $dados[0]['nome'];?>" required>
		<label>RG::</label>
		<input type="text" name="rg" value="<?php echo $dados[0]['rg'];?>" required>
		<label>Data de nascimento:</label>
		<input id="date" type="date" name="data" value="<?php echo $dados[0]['data_nasc'];?>" required>
		<label>CPF:</label>
		<input type="text" name="cpf" value="<?php echo $dados[0]['cpf'];?>" required>
		<label>Telefone:</label>
		<input type="text" name="tel" value="<?php echo $dados[0]['tel'];?>" required>

		<br><br>	
		<input type="submit"  class="botao" name="enviar" value="SALVAR">
		<button class="botao"><a href="index_logado.php?rgedt=<?php echo $_GET["rgedt"]; ?>&acao=adicionar_endereco">Adicionar Endereço</a></button>
	</form>
	<button class="botao"><a href="index_logado.php?&acao=cadastro">Voltar</a></button>
</section>
<?php 
		//Verifica se o campo RG foi preenchido
		if(!empty($_POST['rg'])){


			$nome = $_POST['nome'];
			$data = $_POST['data'];
			$cpf = $_POST['cpf'];
			$tel = $_POST['tel'];
			$rg = $_POST['rg'];

			$logradouro = $_POST['logradouro'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			$complemento = $_POST['complemento'];
			
			//Chama a função de insetir cliente e endereco no banco de dados com os dados do formulário
			$connect-> alteraCliente($nome, $data, $cpf, $tel, $rg, $_GET["rgedt"]);
			

			$connect-> voltarIndex();
			}

			if(!empty($_POST['logradouro']) && !empty($_POST['bairro']) && !empty($_POST['cidade']) && !empty($_POST['estado']) && !empty($_POST['cep'])){

				$connect->insertEndereco($rg, $logradouro, $bairro, $cidade, $estado, $cep, $complemento);
			}
			

	?>