<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ABC Group - Gerenciar Clientes</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menuEmpresa.php"); ?>
		<div class="row mt-3">
			<div class="col-sm-7">
				<h1>Clientes</h1>
			</div>
			<div class="col-sm-5">
				<a type="button" class="btn btn-primary float-right mt-3" href="./FormCliente.php">Novo Cliente</a>
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
					<tbody id="listaClientes"></tbody>
				</table>
			</div>
			<?php //include_once("./rodape.php"); ?>
		</div>
	</div>
	<div class="wait"></div>

	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="scripts/utils.js"></script>
	<script type="text/javascript" src="scripts/clientes.js"></script>

	<script>
		$(function() {
			listar();
		});
	</script>
</body>

</html>