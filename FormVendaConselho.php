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
			<div class="col-sm-9">
				<h1  id="titulo">Venda</h1>
			</div>
			<div class="col-sm-3">
				<a type="button" class="btn btn-primary float-right mt-3" href="ListaVendasConselho.php">Voltar</a>
			</div>
		</div>
		<form id="formVenda" action="javascript:void(0);">
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Empresa</label>
					<input type="text" class="form-control" id="empresa" name="empresa" readonly>
				</div>
				<div class="col">
					<label for="inputEmail">Cliente</label>
					<input type="text" class="form-control" id="cliente" name="cliente" readonly>
				</div>
			</div>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Data</label>
					<input type="text" class="form-control" id="data" name="data" readonly>
				</div>
				<div class="col">
					<label for="inputEmail">Valor (USD)</label>
					<input type="text" class="form-control" id="valor" name="valor" readonly>
				</div>
				<div class="col">
					<label for="inputEmail">Cotação do Dólar</label>
					<input type="text" class="form-control" id="cotacaoDolar" name="cotacaoDolar" readonly>
				</div>
			</div>
		</form>

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
			adaptarCampos();
			vincularEventos();
		});
	</script>
</body>

</html>