<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Detalhes Empresa</title>
</head>

<?php
	include_once("./menuConselho.php");
	include_once("./rodape.php");
?>

<body>
	<div class="container">
		<div class="row mb-6 mt-4">
			<div class="col-sm-9">
				<h1>Vendas - Empresa Y</h1>
				<a type="button" class="btn btn-primary" href="./NovaVendaConselho">Nova Venda</a>
				<a type="button" class="btn btn-primary" href="./ListaVendasConselho">Voltar</a>
			</div>
			<div class="col-sm-3">
				Grafico
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