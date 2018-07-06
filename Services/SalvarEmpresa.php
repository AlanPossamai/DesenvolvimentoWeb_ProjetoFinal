<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	$response = array('success' => false);

	if (isset($_GET['empresa'])) {
		$empresaRepository = new EmpresaRepository();
		$empresa = new Empresa($_GET['empresa']);
		$isSaved = $empresaRepository->save($empresa);

		if ($isSaved) {
			$response = array('success' => true);
		}
	}

	echo json_encode($response);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}