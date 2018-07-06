<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	$paisRepository = new PaisRepository();
	$empresaRepository = new EmpresaRepository();

	$idEmpresa = Session::getInstance()->getByKey('idEmpresa');
	$empresa = $empresaRepository->getById($idEmpresa);
	$result = $paisRepository->getById($empresa['idPais']);

	echo json_encode($result);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}