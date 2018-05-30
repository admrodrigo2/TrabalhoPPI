<?php

require_once('conexaoMysql.php');

if($_SERVER["REQUEST_METHOD"] == "GET"){
	$retorno = array();

	if($_GET['acao'] == 'especialidade'){
		class Consulta 
		{
	 		public $especialidade;
	  		public $id_funcionario;
		}

		$conn = conectaAoMySQL();
		$stmt = $conn->prepare("SELECT especialidade, id_funcionario FROM Funcionario WHERE especialidade <> '' ");
		$stmt->execute();
		$stmt->bind_result($especialidade, $id_funcionario);	
		while($stmt->fetch()){
			$consulta = new Consulta();
			$consulta->especialidade = $especialidade;
	  		$consulta->id_funcionario = $id_funcionario;
			
			$retorno[] = $consulta;
		}	
	}

	if($_GET['acao'] == 'medico'){
		class Medico 
		{
	 		public $nome;
	 		public $id_funcionario;
		}

		$conn = conectaAoMySQL();
		$id = $_GET['id'];
		$stmt = $conn->prepare("SELECT nome, id_funcionario FROM Funcionario WHERE id_funcionario = ? ");
		$stmt->bind_param("i", $id );
		$stmt->execute();
		$stmt->bind_result($nome, $id_funcionario);
		while($stmt->fetch()){
			$medico = new Medico();
			$medico->nome = $nome;
			$medico->id_funcionario = $id_funcionario;

			$retorno[] = $medico;
		}	
	}

	if($_GET['acao'] == 'hora'){
		try{
			$retorno = array(8,9,10,11,12,13,14,15,16,17);

			$conn = conectaAoMySQL();

			$id = $_GET['id'];
			$data = $_GET['data'];

			$SQL = "SELECT hora FROM Agenda WHERE id_funcionario = ? AND data = ? ";
			if(! $stmt = $conn->prepare($SQL))
				throw new Exception("Falha na operacao prepare: " . $conn->error);

			if (! $stmt->bind_param("is", $id, $data))
      			throw new Exception("Falha na operacao bind_param: " . $stmt->error);

      		if (! $stmt->execute())
      			throw new Exception("Falha na operacao execute: " . $stmt->error);

			$stmt->store_result();
			$stmt->bind_result($hora);

			while($stmt->fetch()){

				if(in_array($hora, $retorno)){
					$key = array_search($hora, $retorno);
					unset($retorno[$key]);
				}

			}
		} 
		catch (Exception $e) {
			$msgErro = $e->getMessage();
			echo $msgErro;
		}
	}

	die(json_encode($retorno));
}

?>