<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Torvalds</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<script src="assets/js/script.js"></script>
		<script src="assets/php/consultaAgenda.php"></script>
	</head>
	<body>
		<?php include 'app/core/components/header.php';?>

		<main class="pb-auto">
			<?php include 'app/modules/home/home.php';?>
			<?php include 'app/modules/agendamento/agendamento.php';?>
			<?php include 'app/modules/contato/contato.php';?>
			<?php include 'app/modules/galeria/galeria.php';?>
		</main>

		<?php include 'app/core/components/footer.php';?>
	</body>
</html>