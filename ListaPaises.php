<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<title>Países</title>
</head>

<body>
	<?php include_once("./menuConselho.php"); ?>
	<div class="container">
		<div class="row mt-4">
			<div class="col-sm-7">
				<h1>Países</h1>
			</div>
			<div class="col-sm-5">
				<a type="button" class="btn btn-primary float-right" href="./FormPais.php">Novo País</a>
			</div>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Moeda</th>
							<th scope="col">Ações</th>
						</tr>
					</thead>
					<tbody>
						<tr>
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
		<?php include_once("./rodape.php"); ?>
	</div>

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="scripts/listaPaises.js"></script>
</body>

</html>