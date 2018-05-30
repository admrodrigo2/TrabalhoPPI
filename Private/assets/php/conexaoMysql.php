<?php

define("HOST", "fdb18.awardspace.net"); 
define("USER", "2564649_clinicadb");
define("PASSWORD", "clinctrab2018"); 
define("DATABASE", "2564649_clinicadb");

function conectaAoMySQL()
{
	$conn = new mysqli(HOST, USER, PASSWORD, DATABASE);
	if ($conn->connect_error)
		throw new Exception('Falha na conexão com o MySQL: ' . $conn->connect_error);

	if(!$conn->set_charset("utf8"))
		throw new Exception("Error loading character set utf8: %s", $conn->error);
		

	return $conn;   
}

?>