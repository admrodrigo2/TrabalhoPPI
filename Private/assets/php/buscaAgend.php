<?php

require_once('conexaoMysql.php');

class Agendamento {
	public $nomeM;
	public $espec;
	public $date;
	public $nomeP;
	public $telefone;
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	try {
		$result = array();
		$conn = conectaAoMySQL();

		$SQLagend = "
			SELECT `data`, `hora`, `id_paciente`, `id_funcionario` FROM `Agenda`
		";

		$SQLpac = "
			SELECT `nome`, `telefone`
			FROM `Paciente`
			WHERE `id_paciente` = ?
		";

		$SQLfunc = "
			SELECT `nome`, `especialidade`
			FROM `Funcionario`
			WHERE `id_funcionario` = ?
		";

		if(! $agendamento = $conn->prepare($SQLagend))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		if(! $paciente = $conn->prepare($SQLpac))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		if(! $funcionario = $conn->prepare($SQLfunc))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		if(! $agendamento->execute())
      		throw new Exception("Falha na operacao execute: " . $agendamento->error);

      	$agendamento->store_result();
      	$agendamento->bind_result($data, $hora, $id_p, $id_f);

      	while ($agendamento->fetch()) {

      		if (! $paciente->bind_param("i", $id_p))
      			throw new Exception("Falha na operacao bind_param: " . $paciente->error);

      		if (! $funcionario->bind_param("i", $id_f))
      			throw new Exception("Falha na operacao bind_param: " . $funcionario->error);

      		if (! $paciente->execute())
      			throw new Exception("Falha na operacao execute: " . $paciente->error);

      		$paciente->store_result();
	        $paciente->bind_result($nome, $telefone);
	        $paciente->fetch();

	        if (! $funcionario->execute())
      			throw new Exception("Falha na operacao execute: " . $funcionario->error);

	        $funcionario->store_result();
	        $funcionario->bind_result($nomeM, $esp);
	        $funcionario->fetch();

	        if($paciente->num_rows == 1 && $funcionario->num_rows == 1){
	        	$agend = new Agendamento();

				$agend->nomeM = $nomeM;
				$agend->espec = $esp;
				$agend->date = $data . " " . $hora .":00";
				$agend->nomeP = $nome;
				$agend->telefone = $telefone;

				$result[] = $agend;
	        }
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