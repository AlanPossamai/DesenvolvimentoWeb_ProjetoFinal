<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	$usuarioRepository = new UsuarioRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$usuarios = $usuarioRepository->getById($_GET['id']);
	} else {
		$usuarios = $usuarioRepository->getAll();
	}

	echo json_encode($usuarios);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}