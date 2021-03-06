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
	<title>ABC Group - Gerenciar Vendas</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menu.php"); ?>
		<div class="row mt-3">
			<div class="col-sm-9">
				<h1>Nova Venda</h1>
			</div>
			<div class="col-sm-3">
				<a type="button" class="btn btn-primary float-right mt-3" href="ListaVendas.php">Voltar</a>
			</div>
		</div>
		<form id="formVenda" action="javascript:void(0);">
			<input type="hidden" name="id" id="id" value="0">
			<input type="hidden" name="idEmpresa" id="idEmpresa" value="<?php echo Session::getInstance()->getByKey("idEmpresa"); ?>">
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="inputEmail">Cliente</label>
					<select class="form-control selectpicker" id="cliente" name="idCliente">
						<option value="0">Selecione</option>
					</select>
				</div>
				<div class="col">
					<label for="inputEmail">Data</label>
					<input type="text" class="form-control" id="data" name="data" placeholder="DD/MM/YYYY">
				</div>
			</div>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="valor">Valor <span id="moeda"></span></label>
					<input type="number" class="form-control" id="valor" name="valor">
				</div>
				<div class="col">
					<label for="cotacaoDolar">Cotação do Dólar</label>
					<input type="number" class="form-control" id="cotacaoDolar" name="cotacaoDolar">
				</div>
			</div>
		</form>

		<div class="row mb-6 mt-4">
			<div class="col">
				<button class="btn btn-danger" id="excluir">Excluir</button>
				<button class="btn btn-success" id="salvar">Salvar</button>
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
	<script type="text/javascript" src="scripts/vendas.js"></script>

	<script>
		$(function() {

			if($.urlParam('id') == 0) {
				$.ajax({
					url: 'Services/ObterMoeda.php',
					dataType: 'json',
					data: { 'id': $.urlParam('id') }
				}).done(function (pais) {
					if (!displayErrors(pais)) {
						$('#moeda').html(pais.codigo_moeda);
						$.ajax({
							url: './Utils/currencyQuotes.php',
							dataType: 'json',
							data: { 'to': pais.codigo_moeda }
						}).always(function(result) {
							if (result.error) {
								$('#cotacaoDolar').siblings('label').append(
									$('<small>', {
										'style': 'color: red;',
										'html': '&emsp;' + result.error
									})
								);
							} else {
								$("#cotacaoDolar").val(result.toFixed(2));
							}
						});
					}
				});
			}

			obterClientes();
			adaptarCampos();
			vincularEventos();
		});
	</script>
</body>

</html>