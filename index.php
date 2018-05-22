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
		  /*padding: 50px;*/
		}
		.tab {
		  display: none;
		}

		.divMain {
			display: none;
		}

		/*.navbar:before{
			position: absolute;
		    z-index: -1;
		    top: 0;
		    right: 0;
		    bottom: 0;
		    left: 0;
		    content: "";
		    transition: opacity .15s linear;
		    opacity: 0;
		    border-bottom: 1px solid rgba(0,0,0,.1);
		    background-color: #fff;
		}*/
		

		.section {
			position: relative;
			padding: 5rem 0;
		}
		.section-top{
			padding-top: 13.14rem;
		}

		.bg-cover, .bg-overlay, .bg-overlay:before {
		    position: absolute;
		    top: 0;
		    right: 0;
		    bottom: 0;
		    left: 0;
		}

		.bg-cover {
		    background-repeat: no-repeat;
		    background-position: 50%;
		    background-size: cover;
		}

		</style>
		<script src="assets/js/script.js"></script>
		<script src="assets/php/consultaAgenda.php"></script>
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