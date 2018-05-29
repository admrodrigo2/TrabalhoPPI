<?php

require_once('conexaoMysql.php');
require_once('func.php');


class Endereco 
{
	public $lograd;
	public $log;
	public $bairro;
	public $cidade;
	public $estado;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {

	try {
		$endereco = new Endereco();
		$cep = "";
		
		if(!isset($_GET["cep"]))
			throw new Exception("O cep deve ser fornecido!1");

		$cep = filtraEntrada($_GET["cep"]);

		if($cep == "")
			throw new Exception("O cep deve ser fornecido!0");

		$conn = conectaAoMySQL();

		$SQL = "
            SELECT tipo_logradouro, logradouro, bairro, cidade, estado
            FROM EnderecoFunc 
            WHERE cep = ?
            LIMIT 1
            ";


		if(! $stmt = $conn->prepare($SQL))
			throw new Exception("Falha na operacao prepare: " . $conn->error);
                        
		if (! $stmt->bind_param("s", $cep))
      		throw new Exception("Falha na operacao bind_param: " . $stmt->error);

        if (! $stmt->execute())
      		throw new Exception("Falha na operacao execute: " . $stmt->error);
                
        $stmt->store_result();
        $stmt->bind_result($tipLog, $log, $bairro, $cidade, $estado);
        $stmt->fetch();
                
      	if($stmt->num_rows == 1){
			$endereco->lograd = $tipLog;
			$endereco->log = $log;
			$endereco->bairro = $bairro;
			$endereco->cidade = $cidade;
			$endereco->estado = $estado;
     	}

		$jsonStr = json_encode($endereco);
		echo $jsonStr;

	}
	catch (Exception $e) {
		$msgErro = $e->getMessage();
		echo $msgErro;
	}
}

?>