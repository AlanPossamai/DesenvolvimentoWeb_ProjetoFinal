<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ABC Group - Login</title>
</head>

<body>
	<div class="container">
		<form class="form-signin" id="formLogin" action="javascript:void(0);">
			<div class="text-center mb-6 mt-4">
				<h1 class="h3 mb-3 font-weight-normal">ABC Group</h1>
			</div>
			<div class="row text-center">
				<div class="col-6 offset-3">
					<div class="form-label-group">
						<label for="login">Login</label>
						<input type="text" id="login" name="login" class="form-control">
					</div>
				</div>

				<div class="col-6 offset-3">
					<div class="form-label-group">
						<label for="senha">Senha</label>
						<input type="password" id="senha" name="senha" class="form-control">
					</div>
				</div>

				<div class="col-6 offset-3">
					<div class="checkbox mb-3">
						<label>
							<button class="btn btn-lg btn-primary btn-block mt-5 mb-3 text-center" id="btnLogin">Entrar</button>
						</label>
					</div>
				</div>
			</div>
		</form>
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
	<script type="text/javascript" src="scripts/login.js"></script>
</body>

</html>