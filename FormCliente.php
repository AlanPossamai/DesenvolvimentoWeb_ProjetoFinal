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
	<title>ABC Group - Gerenciar Cliente</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menu.php"); ?>
		<div class="row mt-3">
			<div class="col-sm-9">
				<h1>Novo Cliente</h1>
			</div>
			<div class="col-sm-3">
				<a type="button" class="btn btn-primary float-right mt-3" href="ListaClientes.php">Voltar</a>
			</div>
		</div>
		<form id="formCliente" action="javascript:void(0);">
			<input type="hidden" name="id" id="id" value="0">
			<input type="hidden" name="idEmpresa" id="idEmpresa" value="<?php echo Session::getInstance()->getByKey("idEmpresa"); ?>">

			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome">
				</div>
			</div>
		</form>

		<div class="row mb-6 mt-4">
			<div class="col">
				<button class="btn btn-danger" id="excluir">Excluir</button>
				<button class="btn btn-success" id="salvar">Salvar</button>
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
	<script type="text/javascript" src="scripts/clientes.js"></script>

	<script>
		$(function() {
			adaptarCampos();
			vincularEventos();
		});
	</script>
</body>

</html>