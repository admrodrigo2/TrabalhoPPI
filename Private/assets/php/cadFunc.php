<?php
require_once('conexaoMysql.php');
require_once('func.php');

$nome = $nasc = $sexo = $est = $cargo = $esp = $cpf = $rg = $carTrab = $cep = "";
$tipLog = $log = $num = $comp = $bairro = $cidade = $estado = "";
$conn = conectaAoMySQL();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	try {
		if(!isset($_POST["nome"]))
			throw new Exception("O nome deve ser fornecido!");
		if(!isset($_POST["dataNasc"]))
			throw new Exception("A data de nascimento deve ser fornecida!");
		if(!isset($_POST["sexo"]))
			throw new Exception("O sexo deve ser fornecido!");
		if(!isset($_POST["estCivil"]))
			throw new Exception("O Estado Civil deve ser fornecido!");
		if(!isset($_POST["cargo"]))
			throw new Exception("O cargo deve ser fornecido!");
		if(!isset($_POST["especialidade"]))
			throw new Exception("A especialidade deve ser fornecida!");
		if(!isset($_POST["cpf"]))
			throw new Exception("O cpf deve ser fornecido!");
		if(!isset($_POST["rg"]))
			throw new Exception("O rg deve ser fornecido!");
		if(!isset($_POST["carTrab"]))
			throw new Exception("O numero da carteira de trabalho deve ser fornecido!");
		if(!isset($_POST["cep"]))
			throw new Exception("O cep deve ser fornecido!");
		if(!isset($_POST["tipLog"]))
			throw new Exception("O Tipo de Logradouro deve ser fornecido!");
		if(!isset($_POST["log"]))
			throw new Exception("O Logradouro deve ser fornecido!");
		if(!isset($_POST["num"]))
			throw new Exception("O numero deve ser fornecido!");
		if(!isset($_POST["comp"]))
			throw new Exception("O Complemento deve ser fornecido!");
		if(!isset($_POST["bairro"]))
			throw new Exception("O Bairro deve ser fornecido!");
		if(!isset($_POST["cidade"]))
			throw new Exception("A cidade deve ser fornecida!");
		if(!isset($_POST["estado"]))
			throw new Exception("O estado deve ser fornecido!");

		$nome = filtraEntrada($_POST["nome"]);
		$nasc = filtraEntrada($_POST["dataNasc"]);
		$sexo = filtraEntrada($_POST["sexo"]);
		$est = filtraEntrada($_POST["estCivil"]);
		$cargo = filtraEntrada($_POST["cargo"]);
		$esp = filtraEntrada($_POST["especialidade"]);
		$cpf = filtraEntrada($_POST["cpf"]);
		$rg = filtraEntrada($_POST["rg"]);
		$carTrab = filtraEntrada($_POST["carTrab"]);
		$cep = filtraEntrada($_POST["cep"]);
		$tipLog = filtraEntrada($_POST["tipLog"]);
		$log = filtraEntrada($_POST["log"]);
		$num = filtraEntrada($_POST["num"]);
		$comp = filtraEntrada($_POST["comp"]);
		$bairro = filtraEntrada($_POST["bairro"]);
		$cidade = filtraEntrada($_POST["cidade"]);
		$estado = filtraEntrada($_POST["estado"]);

		if($nome == "")
			throw new Exception("O nome deve ser fornecido! empty");
		if($nasc == "")
			throw new Exception("A data de nascimento deve ser fornecida!");
		if($sexo == "")
			throw new Exception("O sexo deve ser fornecido!");
		if($est == "")
			throw new Exception("O Estado Civil deve ser fornecido!");
		if($cargo == "")
			throw new Exception("O cargo deve ser fornecido!");
		if($cargo == "medico" && $esp == "")
			throw new Exception("A especialidade deve ser fornecida!");
		if($cpf == "")
			throw new Exception("O cpf deve ser fornecido!");
		if($rg == "")
			throw new Exception("O rg deve ser fornecido!");
		if($carTrab == "")
			throw new Exception("O numero da carteira de trabalho deve ser fornecido!");
		if($cep == "")
			throw new Exception("O cep deve ser fornecido!");
		if($tipLog == "")
			throw new Exception("O Tipo de Logradouro deve ser fornecido!");
		if($log == "")
			throw new Exception("O Logradouro deve ser fornecido!");
		if($num == "")
			throw new Exception("O numero deve ser fornecido!");
		if($comp == "")
			throw new Exception("O Complemento deve ser fornecido!");
		if($bairro == "")
			throw new Exception("O Bairro deve ser fornecido!");
		if($cidade == "")
			throw new Exception("A cidade deve ser fornecida!");
		if($estado == "")
			throw new Exception("O estado deve ser fornecido!");

		$SQLfunc = "
			INSERT INTO `Funcionario`
			(`id_funcionario`, `nome`, `data_nascimento`, `sexo`, `estado_civil`, `cargo`, `especialidade`, `cpf`, `rg`, `carTrab`)
			VALUES (null,?,?,?,?,?,?,?,?,?)
		";
		$SQLend = "
			INSERT INTO `EnderecoFunc`
			(`id_endereco`, `id_funcionario`, `cep`, `tipo_logradouro`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`)
			VALUES (null, LAST_INSERT_ID(),?,?,?,?,?,?,?,?)
		";

		if(! $stmtFunc = $conn->prepare($SQLfunc))
			throw new Exception("Falha na operacao prepare: " . $conn->error);
		if(! $stmtEnd = $conn->prepare($SQLend))
			throw new Exception("Falha na operacao prepare: " . $conn->error);

		$conn->begin_transaction();

		if(! $stmtFunc->bind_param("sssssssss", $nome, $nasc, $sexo, $est, $cargo, $esp, $cpf, $rg, $carTrab))
			throw new Exception("Falha na operacao bind_param: " . $stmt->error);
		if(! $stmtEnd->bind_param("sssissss", $cep, $tipLog, $log, $num, $comp, $bairro, $cidade, $estado))
			throw new Exception("Falha na operacao bind_param: " . $stmt->error);

		if (! $stmtFunc->execute())
      		throw new Exception("Falha na operacao execute: " . $stmt->error);
      	if (! $stmtEnd->execute())
      		throw new Exception("Falha na operacao execute: " . $stmt->error);

		$conn->commit();

		echo "OK";

	} 
	catch (Exception $e) {
		$conn->rollback();
		echo "Ocorreu um erro na transação: " . $e->getMessage();
	}
}

?>