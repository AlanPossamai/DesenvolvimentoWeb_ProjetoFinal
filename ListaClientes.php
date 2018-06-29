<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Cliente</title>
</head>

<?php
	include_once("./menuEmpresa.php");
	include_once("./rodape.php");
?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-7">
				<h1>Clientes</h1>
			</div>
			<div class="col-sm-5">
				<a type="button" class="btn btn-primary" href="./FormCliente.php">Novo Cliente</a>
			</div>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>teste</td>
							<td>
								<a type="button" class="btn btn-primary" href="#">Ver Detalhes</a>
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