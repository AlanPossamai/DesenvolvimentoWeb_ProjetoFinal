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
	<title>ABC Group - Gerenciar Vendas</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menu.php"); ?>
		<div class="row mt-3">
			<div class="col-sm-6">
				<h1>Vendas</h1>
			</div>
			<div class="col-sm-3">
				<select name="empresa" id="idEmpresa" class="form-control">
					<option value="0">Selecione</option>
				</select>
			</div>
			<div class="col-sm-3">
				<a type="button" id="visualizar" class="btn btn-primary float-right mt-3" href="#">Pesquisar</a>
			</div>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Empresa</th>
							<th scope="col">Cliente</th>
							<th scope="col">Data</th>
							<th scope="col">Valor</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody id="listaVendas"></tbody>
				</table>
			</div>
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
	<script type="text/javascript" src="scripts/vendasConselho.js"></script>

	<script>
		$(function() {
			listar();
			obterEmpresas();
			vincularEventos();
		});
	</script>
</body>

</html>