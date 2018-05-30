<?php

require_once('conexaoMysql.php');

class Funcionario {
	public $nome;
	public $sexo;
	public $cargo;
	public $rg;
	public $log;
	public $cidade;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	try {
		$result = array();
		$conn = conectaAoMySQL();

		$SQLfunc = "
			SELECT `id_funcionario`, `nome`, `sexo`, `cargo`, `rg` FROM `Funcionario`
		";

		$SQLend = "
			SELECT `tipo_logradouro`, `logradouro`, `cidade`
			FROM `EnderecoFunc`
			WHERE `id_funcionario` = ?
		";

		if(! $stmtfunc = $conn->prepare($SQLfunc))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		if(! $stmtend = $conn->prepare($SQLend))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		if(! $stmtfunc->execute())
      		throw new Exception("Falha na operacao execute: " . $stmtfunc->error);

      	$stmtfunc->store_result();
      	$stmtfunc->bind_result($id, $nome, $sexo, $cargo, $rg);

      	while ($stmtfunc->fetch()) {

      		if (! $stmtend->bind_param("i", $id))
      			throw new Exception("Falha na operacao bind_param: " . $stmtend->error);

        	if (! $stmtend->execute())
      			throw new Exception("Falha na operacao execute: " . $stmtend->error);

      		$stmtend->store_result();
	        $stmtend->bind_result($tipLog, $log, $cidade);
	        $stmtend->fetch();

	        if($stmtend->num_rows == 1){
	        	$func = new Funcionario();

				$func->nome = $nome;
				$func->sexo = $sexo;
				$func->cargo = $cargo;
				$func->rg = $rg;
				$func->log = $tipLog . " " . $log;
				$func->cidade = $cidade;

				$result[] = $func;
	        }
      	}

      	die(json_encode($result));
	}
	catch (Exception $e) {
		$msgErro = $e->getMessage();
		echo $msgErro;
	}
}
?>