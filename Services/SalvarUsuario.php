<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	$response = array('success' => false);
	// die(print_r($_GET['usuario'], 1));

	if (isset($_GET['usuario'])) {
		$usuarioRepository = new UsuarioRepository();
		$usuario = new Usuario($_GET['usuario']);
		$isSaved = $usuarioRepository->save($usuario);

		if ($isSaved) {
			 $response = array('success' => true);
		}
	}

	echo json_encode($response);
} catch(Exception $e) {
	http_response_code(400);
	echo json_encode(array('success' => false, 'msg' => $e->getMessage()));
}