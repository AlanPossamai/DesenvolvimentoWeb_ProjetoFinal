<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Novo Cliente</title>
</head>

<?php
	include_once("./menuEmpresa.php");
	include_once("./rodape.php");
?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<h1>Novo Cliente</h1>
			</div>
			<div class="col-sm-3">
				<a type="button" class="btn btn-primary" href="./ListaClientes.php">Voltar</a>
			</div>
		</div>
		<form>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Nome</label>
					<input type="text" class="form-control">
				</div>
			</div>

			<div class="row mb-6 mt-4">
				<div class="col">
					<a type="button" class="btn btn-primary" href="#">Salvar</a>
					<a type="button" class="btn btn-primary" href="#">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</body>

</html>