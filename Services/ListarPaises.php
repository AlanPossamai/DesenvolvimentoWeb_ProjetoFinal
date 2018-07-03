<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$paisRepository = new PaisRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$paises = $paisRepository->getById($_GET['id']);
	} else {
		$paises = $paisRepository->getAll();
	}

	echo json_encode($paises);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}