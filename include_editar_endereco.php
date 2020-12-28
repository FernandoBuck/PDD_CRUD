<?php 
	$dados = $connect->buscaClienteRG($_GET["rgedt"]);
	$dados_end = $connect->buscaEnderecosRG($_GET['rgedt']);


	for ($i=0; $i < count($dados_end); $i++) { 
		if ($_GET["endedt"]==$dados_end[$i]['id_endereco']) {
			$e = $i;
		}
	}


?>

<section class="formulario">
	<form method="POST">
		

		<h3>Endereço:</h3></br>
		<label>Logradouro:</label>
		<input type="text" name="logradouro" value="<?php echo $dados_end[$e]['logradouro'];?>" required>
		<label>Bairro:</label>
		<input type="text" name="bairro" value="<?php echo $dados_end[$e]['bairro'];?>" required>
		<label>Cidade:</label>
		<input type="text" name="cidade" value="<?php echo $dados_end[$e]['cidade'];?>" required>
		<label>Estado:</label>
		<input type="text" name="estado" value="<?php echo $dados_end[$e]['estado'];?>" required>
		<label>CEP:</label>
		<input type="number" name="cep" value="<?php echo $dados_end[$e]['cep'];?>" required>
		<label>Complemento:</label>
		<input type="text" name="complemento" value="<?php echo $dados_end[$e]['complemento'];?>">

		<br><br>	
		<input  class="botao"type="submit" name="enviar" value="EDITAR" >
	</form>
	<button><a href="index_logado.php?rgedt=<?php echo $_GET['rgedt']; ?>&acao=editar">Voltar</a></button>
</section>
<?php 
		
		if(!empty($_POST['logradouro'])){

			$logradouro = $_POST['logradouro'];
			$bairro = $_POST['bairro'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			$complemento = $_POST['complemento'];
			
			
			$connect-> alteraEndereco($logradouro, $bairro, $complemento, $cidade, $estado, $cep, $_GET["endedt"]);
			

			//$connect-> voltarIndex();
			}
			

	?>
