<?php 

class Database{

	private $dbname = "pdd_crud";
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $pdo;
	

	//contrutor
	public function __construct(){
		

		try{
			$this->pdo = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host,$this->user,$this->password);
		}catch (PDOException $e){
			throw new PDOException($e);
			
		}catch (Exception $e){
			throw new Exception($e);
		}

	}

	function voltarIndex(){
        header("Location:index_logado.php");
    }

    function executeQuery(){
    	try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
    }


	public function buscaTodosClientes(){
		$res = array();
		$cmd = $this->pdo->prepare("SELECT * FROM cliente ORDER BY nome");
		$cmd->execute();
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}


	public function insertCliente($nome, $data, $cpf, $tel, $rg){
		$cmd = $this->pdo->prepare("INSERT INTO cliente (nome, data_nasc, cpf, tel, rg) VALUES (:nome, :data, :cpf, :tel, :rg)");
		$cmd->bindparam(":nome",$nome);
		$cmd->bindparam(":data",$data);
		$cmd->bindparam(":cpf",$cpf);
		$cmd->bindparam(":tel",$tel);
		$cmd->bindparam(":rg",$rg);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}			

	}

	public function insertEndereco($rg,$logradouro, $bairro, $ciadade, $estado, $cep, $complemento){
		$cmd =$this->pdo->prepare("INSERT INTO endereco (logradouro, bairro, cidade, estado, cep, complemento, rg_cliente) VALUES (:l, :b, :c, :e, :cep, :comp, :rg_c)");
		$cmd->bindparam(":l",$logradouro);
		$cmd->bindparam(":b",$bairro);
		$cmd->bindparam(":c",$ciadade);
		$cmd->bindparam(":e",$estado);
		$cmd->bindparam(":cep",$cep);
		$cmd->bindparam(":comp",$complemento);
		$cmd->bindparam(":rg_c",$rg);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
			
		
	}

	public function insertUsuario($login, $senha){
		$cmd =$this->pdo->prepare("INSERT INTO usuario (login, senha) VALUES (:login, :senha)");
		$cmd->bindparam(":login",$login);
		$cmd->bindparam(":senha",$senha);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
			
		
	}
	

	public function deleteCliente($rg){
		$cmd =$this->pdo->prepare("DELETE FROM cliente WHERE rg = :rg");
		$cmd->bindparam(":rg",$rg);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}

	}

	public function deleteEndereco($id_endereco){
		//$res = array();
		//$res = buscaEnderecosRG($rgedt);
		//if (count($res) > 1){
			$cmd =$this->pdo->prepare("DELETE FROM endereco WHERE id_endereco = :id");
			$cmd->bindparam(":id",$id_endereco);
			try{
			$cmd->execute();	
			}catch (PDOException $e){
				echo "PDO Error: ".$e."<br>";
				
				exit();
			}catch (Exception $e){
				echo "Error: ".$e;
				exit();
			}
		//}
		
	}

	public function deleteUsuario($id_usuario){
		$cmd =$this->pdo->prepare("DELETE FROM usuario WHERE id = :id");
		$cmd->bindparam(":id",$id_usuario);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
	}

	public function buscaClienteRG($rg){
		$res = array();
		$cmd = $this->pdo->prepare("SELECT * FROM cliente where rg = :rg");
		$cmd->bindparam(":rg",$rg);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);

		return $res;
	}

	

	public function buscaEnderecosRG($rg){
		$res = array();
		$cmd = $this->pdo->prepare("SELECT * FROM endereco where rg_cliente = :rg");
		$cmd->bindparam(":rg",$rg);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}


	public function alteraCliente($nome, $data, $cpf, $tel, $novorg, $rg){
		$cmd = $this->pdo->prepare("UPDATE cliente SET nome = :nome, data_nasc = :data, cpf = :cpf, tel = :tel, rg = :novorg WHERE cliente.rg = :rg;");
		$cmd->bindparam(":rg",$rg);
		$cmd->bindparam(":nome",$nome);
		$cmd->bindparam(":data",$data);
		$cmd->bindparam(":cpf",$cpf);
		$cmd->bindparam(":tel",$tel);
		$cmd->bindparam(":novorg",$novorg);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
	}

	public function alteraEndereco($logradouro, $bairro, $complemento, $cidade, $estado, $cep, $id_endereco){
		$cmd = $this->pdo->prepare("UPDATE endereco SET logradouro = :l, bairro = :b, complemento = :c, cidade = :cid, estado = :est, cep = :cep WHERE endereco.id_endereco = :id_end;");
		$cmd->bindparam(":l",$logradouro);
		$cmd->bindparam(":b",$bairro);
		$cmd->bindparam(":c",$complemento);
		$cmd->bindparam(":cid",$cidade);
		$cmd->bindparam(":est",$estado);
		$cmd->bindparam(":cep",$cep);
		$cmd->bindparam(":id_end",$id_endereco);
		try{
		$cmd->execute();	
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
	}

	public function verificaLogin($login, $senha){
		$res = array();
		$cmd = $this->pdo->prepare("SELECT * FROM usuario WHERE login = :login AND senha = :senha");
		$cmd->bindparam(":login",$login);
		$cmd->bindparam(":senha",$senha);
		try{
			$cmd->execute();
		}catch (PDOException $e){
			echo "PDO Error: ".$e."<br>";
			
			exit();
		}catch (Exception $e){
			echo "Error: ".$e;
			exit();
		}
		$res = $cmd->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) == 1) {
			return true;
		}else{
			return false;
		}
	}

	
}

?>