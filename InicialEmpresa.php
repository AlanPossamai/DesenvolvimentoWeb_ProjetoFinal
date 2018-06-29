<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Inicial Empresa</title>
</head>

<?php
	include_once("./menuEmpresa.php");
	include_once("./rodape.php");
?>

<body>
	<div class="container">
		<div class="text-center mb-6 mt-4">
			<h1 class="font-weight-normal">ABC Group - Página Inicial</h1>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Seja Bem-Vindo, --</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-6 mt-4">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Total de vendas da empresa</h5>
						<p class="card-text"> BRL</p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Cotação do Dólar Hoje</h5>
						<p class="card-text">USD</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>