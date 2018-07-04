<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ABC Group - Gerenciar Usuários</title>
</head>

<body>
	<div class="container">
		<?php include_once("./menuConselho.php"); ?>

		<div class="row mt-3">
			<div class="col-sm-9">
				<h1 id="titulo">Novo Usuário</h1>
			</div>
			<div class="col-sm-3">
				<a type="button" class="btn btn-primary float-right mt-3" href="./ListaUsuariosConselho.php">Voltar</a>
			</div>
		</div>
		<form id="formUsuario" action="javascript:void(0);">
			<input type="hidden" id="id" name="id" value="0">

			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="nome">Nome</label>
					<input type="text" id="nome" name="nome" class="form-control">
				</div>
				<div class="col">
					<label for="login">Login</label>
					<input type="text" id="login" name="login" class="form-control">
				</div>
			</div>
			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="senha">Senha</label>
					<input type="password" id="senha" name="senha" class="form-control">
				</div>
				<div class="col">
					<label for="confirmarSenha">Confirmar Senha</label>
					<input type="password" id="confirmarSenha" name="confirmarSenha" class="form-control">
				</div>
			</div>

			<div class="row mb-6 mt-4">
				<div class="col">
					<label for="empresa">Empresa</label>
					<select class="form-control selectpicker" id="empresa" name="idEmpresa">
						<option value="0">Conselho</option>
					</select>
				</div>
			</div>
		</form>

		<div class="row mb-6 mt-4">
			<div class="col">
				<button class="btn btn-danger" id="excluir">Excluir</button>
				<button class="btn btn-success" id="salvar">Salvar</button>
			</div>
		</div>

		<?php //include_once("./rodape.php"); ?>
	</div>
	<div class="wait"></div>

	<link rel="stylesheet" href="bootstrap-4.0.0/bootstrap.min.css">
	<link rel="stylesheet" href="styles/styles.css">
	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="scripts/utils.js"></script>
	<script type="text/javascript" src="scripts/usuarios.js"></script>

	<script>
		$(function() {
			obterEmpresas();
			adaptarCampos();
			vincularEventos();
		});
	</script>

	</div>
</body>

</html>