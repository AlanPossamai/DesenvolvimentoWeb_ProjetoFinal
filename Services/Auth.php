<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

if (isset($_POST['login']) && isset($_POST['senha'])) {
	$auth = new Authenticator();
	$response = $auth->authenticate($_POST['login'], $_POST['senha']);

	if ($response instanceof ErrorObj) {
		echo json_encode((array) $response);
	} else {
		echo json_encode(array('success' => 1, 'idEmpresa' => $response->getIdEmpresa()));
	}
} else {
	$response = new ErrorObj(401, 'Usuário ou senha inválidos.', '');
	echo json_encode((array) $response);
}