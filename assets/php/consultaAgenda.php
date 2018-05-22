<?php

require_once('conexaoMysql.php');



$retorno = array();

if($_GET['acao'] == 'especialidade'){
	$conn = conectaAoMySQL();
	$stmt = $conn->prepare("SELECT especialidade, id_funcionario FROM Funcionario");
	$stmt->execute();
	$stmt->bind_result($especialidade, $id_funcionario);	
	while($stmt->fetch()){
		$retorno[] = $especialidade;
	}	
}

die(json_encode($retorno));

?>