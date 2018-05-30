<?php

require_once 'assets/php/autenticacao.php';
require_once 'assets/php/conexaoMysql.php';
session_start();
$conn = conectaAoMySQL();

if($_SERVER['REQUEST_METHOD'] == 'POST')
	if($_POST['initSession'] == 1)
		loginUsuario($_POST['user'], $_POST['senha'], $conn);

checkOrDie($conn);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Torvalds</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="assets/js/script.js"></script>
	</head>
	<body>
		<?php include 'app/core/components/header.php';?>

		<main>
		<?php include 'app/modules/listagem/funcionario.php';?>
		<?php include 'app/modules/listagem/agendamento.php';?>
		<?php include 'app/modules/listagem/contato.php';?>
		<?php include 'app/modules/cadastro/funcionario.php';?>
		</main>

		<?php include 'app/core/components/footer.php';?>
	</body>
</html>
