<?php
	require_once './config.php';
	require_once './Utils/Session.php';
	require_once './Utils/Authenticator.php';
	Authenticator::requireLogin();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ABC Group - Gerenciar Clientes</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menu.php"); ?>
		<div class="row mt-3">
			<div class="col-sm-7">
				<h1>Clientes</h1>
			</div>
			<div class="col-sm-5">
				<a type="button" class="btn btn-primary float-right mt-3" href="./FormCliente.php">Novo Cliente</a>
			</div>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody id="listaClientes"></tbody>
				</table>
			</div>
			<?php include_once("./rodape.php"); ?>
		</div>
	</div>
	<div class="wait"></div>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="Includes/dist/css/bootstrap.min.css">

	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="Includes/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="Includes/assets/js/vendor/popper.min.js"></script>
	<script type="text/javascript" src="Includes/dist/js/bootstrap.min.js"></script>

	<!-- Project properties -->
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/utils.js"></script>
	<script type="text/javascript" src="scripts/clientes.js"></script>

	<script>
		$(function() {
			listar();
		});
	</script>
</body>

</html>