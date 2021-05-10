<?php

/**
 * Conexão com o banco de dados
 */
 class Connect
 {
 	
 	var $localhost = "localhost";
 	var $root = "root";
 	var $passwd = "";
 	var $database = "controlestoque";
 	var $SQL;
 	


 	public function __construct()
 	{
 		$this->SQL = mysqli_connect($this->localhost, $this->root, $this->passwd);
		mysqli_select_db($this->SQL, $this->database);
		if(!$this->SQL){
			die("Conexão com o banco de dados falhou!:" . mysqli_connect_error($this->SQL)); 
		}
 	}

 	function login($username, $password){

 		$this->query  = "SELECT * FROM `usuario` WHERE `Username` = '$username'";
 		$this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL));
 		$this->total  = mysqli_num_rows($this->result);

 		if($this->total){

 			$this->dados = mysqli_fetch_array($this->result);
 			if(!strcmp($password, $this->dados['Password'])){

 				$_SESSION['idUsuario'] = $this->dados['idUser'];
 				$_SESSION['usuario']   = $this->dados['Username'];
 				$_SESSION['perm']      = $this->dados['Permissao'];
 				$_SESSION['foto']      = $this->dados['imagem'];
 				
 				header("Location: ../views/itens/");
 			}else{
 				header("Location: ../login.php?alert=2");
 			}
 		}else{
 				header("Location: ../login.php?alert=1");
 			}
 	}
	
	function limpaCPF_CNPJ($valor){
 		
		 $valor = trim($valor);
		 $valor = str_replace(".", "", $valor);
		 $valor = str_replace(",", "", $valor);
		 $valor = str_replace("-", "", $valor);
		 $valor = str_replace("/", "", $valor);
		 return $valor;
	}
	function format_CPF($nbr_cpf){
 		
		 	$parte_um     = substr($nbr_cpf, 0, 3);
			$parte_dois   = substr($nbr_cpf, 3, 3);
			$parte_tres   = substr($nbr_cpf, 6, 3);
			$parte_quatro = substr($nbr_cpf, 9, 2);

			$monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

		return $monta_cpf;
	}

	function format_moeda($valor){
		return 'R$' . number_format($valor, 2, ',', '.');
	}

	function mask($val, $mask)
	{
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++)
		{
			if($mask[$i] == '0')
			{
				if(isset($val[$k]))
					$maskared .= $val[$k++];
			}
			else
			{
				if(isset($mask[$i]))
					$maskared .= $mask[$i];
			}
		}
		return $maskared;
	}
 	
 }
$connect = new Connect; 
