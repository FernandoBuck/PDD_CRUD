<?php 
	$dados = $connect->buscaTodosClientes();
?>

<section class="tabelaCliente">
	
		<?php
			if (count($dados) > 0) {
				echo "<table>
						<tr class=\"tituloTabelaCliente\">
							<td>Nome</td>
							<td>Data de Nascimento</td>
							<td>RG</td>
							<td>CPF</td>
							<td colspan=\"2\">Telefone</td>
						</tr>";
				for ($i=0; $i < count($dados); $i++) { 
					echo "<tr>";
					foreach ($dados[$i] as $key => $value) {
						echo "<td>".$value."</td>";
					}
					?>
					<td><a class="botaotable" href="index_logado.php?rgedt=<?php echo $dados[$i]['rg']; ?>&acao=editar">Editar</a>
						<a class="botaotable" href="index_logado.php?rgdel=<?php echo $dados[$i]['rg']; ?>">Excluir</a></td>
					<?php
					
				}
				echo "</table>";
			}else{
				echo "Sem clientes cadastrados.";
			}
		?>
	
</section>

<?php 
	if(isset($_GET['rgdel'])){
		$rgdel = $_GET['rgdel'];
		$connect->deleteCliente($rgdel);
		$connect->voltarIndex();
	}

 ?>