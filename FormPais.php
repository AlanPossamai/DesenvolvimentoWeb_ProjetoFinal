<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>ABC Group - Países</title>
</head>

<body>
	<?php include_once("./menuConselho.php"); ?>
	<div class="container">
		<div class="row mt-3">
			<div class="col-sm-9">
				<h1 id="titulo">Novo País</h1>
			</div>
			<div class="col-sm-3">
				<a type="button" class="btn btn-primary float-right mt-3" href="./ListaPaises.php">Voltar</a>
			</div>
		</div>
		<form id="formPais" action="javascript:void(0);">
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Nome</label>
					<input type="hidden" name="id" id="id" value="0">
					<input type="text" class="form-control" name="nome" id="nome">
				</div>
			</div>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Moeda</label>
					<input type="text" class="form-control" name="moeda" id="moeda">
				</div>
			</div>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Código da moeda</label>
					<input type="text" class="form-control" name="codigo_moeda" id="codigoMoeda">
				</div>
			</div>

			<div class="row mb-6 mt-4">
				<div class="col">
					<button class="btn btn-danger" id="excluir">Excluir</button>
					<button class="btn btn-success" id="salvar">Salvar</button>
				</div>
			</div>
		</form>
		<?php //include_once("./rodape.php"); ?>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="scripts/utils.js"></script>
	<script type="text/javascript" src="scripts/paises.js"></script>
	<script>
		$(function() {
			adaptarCampos();
			vincularEventos();
		});
	</script>
</body>

</html>