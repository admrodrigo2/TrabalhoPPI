<?php

require_once('conexaoMysql.php');

class Contato {
	public $nome;
	public $email;
	public $motivo;
	public $mensagem;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	try {
		$result = array();
		$conn = conectaAoMySQL();

		$SQL = "
			SELECT `nomeCliente`, `emailCliente`, `motivo`, `mensagem` FROM `Contato`
		";

		if(! $stmt = $conn->prepare($SQL))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		if(! $stmt->execute())
      		throw new Exception("Falha na operacao execute: " . $stmt->error);

      	$stmt->store_result();
      	$stmt->bind_result($nome, $email, $motivo, $mensagem);

      	while ($stmt->fetch()) {
			$cont = new Contato();

			$cont->nome = $nome;
			$cont->email = $email;
			$cont->motivo = $motivo;
			$cont->mensagem = $mensagem;

			$result[] = $cont;
      	}

      	$jsonStr = json_encode($result);
		echo $jsonStr;
	}
	catch (Exception $e) {
		$msgErro = $e->getMessage();
		echo $msgErro;
	}
}
?>