<?php
require_once('conexaoMysql.php');
require_once('func.php');


if ($_SERVER["REQUEST_METHOD"] == "POST"){

	try {
		$user = $pass = "";

		if(!isset($_POST["user"]))
			throw new Exception("O nome de usuário deve ser fornecido!");
		if(!isset($_POST["senha"]))
			throw new Exception("A senha deve ser fornecida!");

		$user = filtraEntradaForm($_POST["user"]);
		$pass = filtraEntradaForm($_POST["senha"]);

		if($user == "")
			throw new Exception("O nome de usuário deve ser fornecido!");
		if($pass == "")
			throw new Exception("A senha deve ser fornecida!");
		
		$conn = conectaAoMySQL();

		$SQL = "
                SELECT usuario, senha 
                FROM Usuario 
                WHERE usuario = ?
                LIMIT 1
                ";

		if(! $stmt = $conn->prepare($SQL))
			throw new Exception("Falha na operacao prepare: " . $conn->error);
                        
		if (! $stmt->bind_param("s", $user))
      		throw new Exception("Falha na operacao bind_param: " . $stmt->error);

        if (! $stmt->execute())
      		throw new Exception("Falha na operacao execute: " . $stmt->error);
                
        $stmt->store_result();
        $stmt->bind_result($username, $senha);
        $stmt->fetch();
                
      	if($stmt->num_rows == 1){

      		if ($user === $username && $pass === $senha) {
      			echo "logged";
      		}
      		else{
      			echo "Usuário e/ou senha errados!";
      		}
      	}
      	else{
      		echo "Não existe nenhum usuario com username igual a $user";
      	}
	}
	catch (Exception $e) {
		$msgErro = $e->getMessage();
		echo $msgErro;
	}
}


?>