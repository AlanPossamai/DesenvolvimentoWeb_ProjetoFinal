<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	$response = array('success' => false);

	if (isset($_GET['venda'])) {
		$vendaRepository = new VendaRepository();
		$_GET['venda']['data'] = DateFormatter::toDatabase($_GET['venda']['data']);
		$venda = new Venda($_GET['venda']);
		$isSaved = $vendaRepository->save($venda);

		if ($isSaved) {
			$response = array('success' => true);
		}
	}

	echo json_encode($response);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}