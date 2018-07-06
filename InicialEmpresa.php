<?php
	require_once './config.php';
	require_once './Utils/Session.php';
	require_once './Utils/Authenticator.php';
	Authenticator::requireLogin();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ABC Group</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menu.php"); ?>
		<div class="text-center mb-6 mt-4">
			<h1 class="font-weight-normal">ABC Group - Página Inicial</h1>
		</div>
		<div class="row mb-6 mt-4 text-center">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Seja Bem-Vindo</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-6 mt-4">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Total de vendas da empresa</h5>
                                                <p class="card-text"><span id="moeda"></span> <span id="total"></span></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Cotação do Dólar Hoje</h5>
                                                <p class="card-text">USD <span id="cotacao"></span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wait"></div>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="Includes/dist/css/bootstrap.min.css">

	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="Includes/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="Includes/assets/js/vendor/popper.min.js"></script>
	<script type="text/javascript" src="Includes/dist/js/bootstrap.min.js"></script>

	<!-- Project properties -->
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/utils.js"></script>
        <script type="text/javascript" src="scripts/inicialEmpresa.js"></script>
        <script>
                listar();
        </script>
</body>

</html>	