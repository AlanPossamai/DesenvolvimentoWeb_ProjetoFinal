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
				<h1>Vendas</h1>
			</div>
			<div class="col-sm-5">
				<a type="button" class="btn btn-primary" href="./FormVenda.php">Nova Venda</a>
			</div>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
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
							<td>
								<a type="button" class="btn btn-success" href="#">Editar</a>
								<a type="button" class="btn btn-danger" href="#">Deletar</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>