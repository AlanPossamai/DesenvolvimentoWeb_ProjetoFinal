<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	$paisRepository = new PaisRepository();

	if (isset($GET['id']) && !empty($GET['id'])) {
		$paises = $paisRepository->getById($GET['id']);
	} else {
		$paises = $paisRepository->getAll();
	}

	echo json_encode($paises);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}