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
		<div class="row mb-6 mt-4">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Seja Bem-Vindo</h5>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Total Geral de Vendas</h5>
						<p class="card-text">USD <span id="total"></span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-6 mt-4">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<div id="chart_div"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
                                                <div id="piechart"></div>
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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Project properties -->
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="scripts/utils.js"></script>
        <script type="text/javascript" src="scripts/inicialConselho.js"></script>
        <script>
                listar();
        </script>
</body>

</html>	]