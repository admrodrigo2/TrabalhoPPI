<?php

require_once('conexaoMysql.php');

$retorno = array();



if($_GET['acao'] == 'especialidade'){
	class Consulta 
	{
 		public $especialidade;
  		public $id_funcionario;
	}

	$conn = conectaAoMySQL();
	$stmt = $conn->prepare("SELECT especialidade, id_funcionario FROM Funcionario");
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

die(json_encode($retorno));

?>