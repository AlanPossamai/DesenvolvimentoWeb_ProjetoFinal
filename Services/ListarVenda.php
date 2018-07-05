<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$vendaRepository = new VendaRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$vendas = $vendaRepository->getById($_GET['id']);
	} else {
		$vendas = $vendaRepository->getAll();
	}

	echo json_encode($vendas);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}