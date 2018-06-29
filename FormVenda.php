<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Vendas Empresa</title>
</head>

<?php
	include_once("./menuEmpresa.php");
	include_once("./rodape.php");
?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<h1>Nova Venda</h1>
			</div>
			<div class="col-sm-5">
				<a type="button" class="btn btn-primary" href="./ListaVendas.php">Voltar</a>
			</div>
		</div>
		<form>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Cliente</label>
					<input type="text" class="form-control">
				</div>
				<div class="col">
					<label for="inputEmail">Data</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Valor(BRL)</label>
					<input type="text" class="form-control">
				</div>
				<div class="col">
					<label for="inputEmail">Cotação do Dólar</label>
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