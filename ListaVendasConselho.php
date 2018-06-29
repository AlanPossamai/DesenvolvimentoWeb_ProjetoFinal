<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Vendas Conselho</title>
</head>

<?php
	include_once("./menuConselho.php");
	include_once("./rodape.php");
?>

<body>
	<div class="container">
		<div class="row mb-6 mt-4">
			<div class="col-sm-3">
				<h1>Vendas</h1>
			</div>
			<div class="col-sm-3">
				<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
					<div class="btn-group" role="group">
						<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
						 aria-expanded="false">
							Selecione a Empresa
						</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
							<a class="dropdown-item" href="#">Empresa1</a>
							<a class="dropdown-item" href="#">Empresa2</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-3">
				<a type="button" class="btn btn-primary" href="#">Pesquisar</a>
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
					<tbody>
						<tr>
							<th scope="row">3</th>
							<td>teste</td>
							<td>teste</td>
							<td>teste</td>
							<td>
								<a type="button" class="btn btn-success" href="#">Ver Detalhes</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>