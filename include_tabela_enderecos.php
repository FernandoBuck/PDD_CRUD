<?php 
	$dados = $connect->buscaEnderecosRG($_GET['rgedt']);
	
?>

<section class="tabelaCliente">
	
		<?php
			if (count($dados) > 0) {
				echo "<table>
						<tr class=\"tituloTabelaCliente\">
							<td>Logradouro</td>
							<td>Bairro</td>
							<td>Complemento</td>
							<td>Cidade</td>
							<td>Estado</td>
							<td>CEP</td>
							<td></td>
						</tr>";
				for ($i=0; $i < count($dados); $i++) { 
					echo "<tr>";
					foreach ($dados[$i] as $key => $value) {
						if ($key!='id_endereco' && $key !='rg_cliente'){
							echo "<td>".$value."</td>";
						}
						
					}
			?>
					<td><a class="botaotable" href="index_logado.php?rgedt=<?php echo $_GET['rgedt']; ?>&endedt=<?php echo $dados[$i]['id_endereco']; ?>&acao=editar_end">Editar</a>
						<a class="botaotable" href="index_logado.php?enddel=<?php echo $dados[$i]['id_endereco']; ?>&acao=editar&rgedt=<?php echo $_GET['rgedt']; ?>">Excluir</a></td>
			<?php
					
				}
					echo "</table>";
					
				}else{
					echo "Sem clientes cadastrados.";
			}
			?>
	
</section>

<?php 
		if(isset($_GET['acao'])){
			if ($_GET['acao']=='editar' && isset($_GET['enddel'])) {
			$enddel = $_GET['enddel'];
			$rgedt = $_GET['rgedt'];
			if (count($dados) > 1) {
				$connect->deleteEndereco($enddel);

			}else{
				echo "Um cliente deve ter, pelo menos, um endereço.";
			}
		}
		
		//$enddel = $_GET['enddel'];
		//$rgedt = $_GET['rgedt'];
		//if (count($dados) > 1) {
		//	$connect->deleteEndereco($enddel);
		//	//header("Location:index_logado.php?endedt=1");
		//}else{
		//	echo "Um cliente deve ter, pelo menos, um endereço.";
		//}
		
	}

 ?>