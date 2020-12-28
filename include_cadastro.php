

<section class="formulario">
	<form method="POST">
		<h3>Cadastro de Cliente:</h3></br>
		<label>Nome:</label>
		<input type="text" name="nome" placeholder="nome" required>
		<label>RG:</label>
		<input type="text" name="rg" placeholder="rg" required>
		<label>Data de nascimento:</label>
		<input id="date" type="date" name="data" placeholder="data" required>
		<label>CPF:</label>
		<input type="text" name="cpf" placeholder="cpf" required>
		<label>Telefone:</label>
		<input type="text" name="tel" placeholder="tel" required>

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
		<input  class="botao"type="submit" name="enviar" value="ENVIAR" onclick="">
	</form>
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
			$connect-> insertCliente($nome, $data, $cpf, $tel, $rg);
			$connect->insertEndereco($rg, $logradouro, $bairro, $cidade, $estado, $cep, $complemento);

			
			}
			

	?>