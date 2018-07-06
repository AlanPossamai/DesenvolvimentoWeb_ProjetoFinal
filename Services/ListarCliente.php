<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$clienteRepository = new ClienteRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$clientes = $clienteRepository->getById($_GET['id']);
	} elseif (isset($_GET['empresa'])) {
		$clientes = $clienteRepository->getByEmpresa(Session::getInstance()->getByKey("idEmpresa"));
	} else {
		$clientes = $clienteRepository->getAll();
	}

	echo json_encode($clientes);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}