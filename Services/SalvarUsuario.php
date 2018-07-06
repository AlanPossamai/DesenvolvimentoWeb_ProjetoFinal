<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	echo json_encode(salvar());
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}

function salvar() {
	$response = array('success' => false);

	if (isset($_GET['usuario'])) {
		if (trim($_GET['usuario']['nome']) == '') {
			return new ErrorObj(400, 'Preencha o nome do usuário');
		} else if (trim($_GET['usuario']['login']) == '') {
			return new ErrorObj(400, 'Preencha o login do usuário');
		} else if ($_GET['usuario']['senha'] != $_GET['usuario']['confirmarSenha']) {
			return new ErrorObj(400, 'As senhas não conferem');
		}

		$usuarioRepository = new UsuarioRepository();
		$usuario = new Usuario($_GET['usuario']);
		$isSaved = $usuarioRepository->save($usuario);

		return array('success' => (bool) $isSaved);
	}
}