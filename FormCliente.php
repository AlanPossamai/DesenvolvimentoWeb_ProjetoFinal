<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ABC Group - Gerenciar Cliente</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menuEmpresa.php"); ?>
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
			<input type="hidden" name="idEmpresa" id="idEmpresa" value="1">

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

		<?php include_once("./rodape.php"); ?>
	</div>
	<div class="wait"></div>

	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
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