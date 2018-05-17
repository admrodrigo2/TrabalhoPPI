<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<style>
		body {
		  padding: 50px;
		}
		.tab {
		  padding: 20px;
		  display: none;
		  border: 0.5px solid lightgray;
		}

		</style>
		<script src="assets/js/script.js"></script>
	</head>
	<body>
		<?php include 'app/core/components/header.php';?>

		<main>
			<?php include 'app/modules/home/home.php';?>
			<?php include 'app/modules/agendamento/agendamento.php';?>
			<?php include 'app/modules/contato/contato.php';?>
			<?php include 'app/modules/galeria/galeria.php';?>
		</main>

		<?php include 'app/core/components/footer.php';?>
	</body>
</html>