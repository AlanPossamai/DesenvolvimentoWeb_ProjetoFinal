<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$empresaRepository = new EmpresaRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$empresas = $empresaRepository->getById($_GET['id']);
	} else {
		$empresas = $empresaRepository->getAll();
	}

	echo json_encode($empresas);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}