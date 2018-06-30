<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	$paisRepository = new PaisRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$paises = $paisRepository->getById($_GET['id']);
	} else {
		$paises = $paisRepository->getAll();
	}

	//TODO: codificação utf8 quebrando json_encode
	echo json_encode($paises);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}