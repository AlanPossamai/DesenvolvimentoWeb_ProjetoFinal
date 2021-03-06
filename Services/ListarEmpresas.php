<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	$empresaRepository = new EmpresaRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$empresas = $empresaRepository->getById($_GET['id']);
	} else {
		Authenticator::verifyPermission('gerenciar empresas');
		$empresas = $empresaRepository->getAll();
	}

	echo json_encode($empresas);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}