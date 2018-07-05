<?php

require_once '../config.php';
// Authenticator::requireLogin();

try {
	$response = array('success' => false);

	if (isset($_GET['venda'])) {
		$vendaRepository = new VendaRepository();
		$venda = new Cliente($_GET['venda']);
		$isSaved = $vendaRepository->save($venda);

		if ($isSaved) {
			$response = array('success' => true);
		}
	}

	echo json_encode($response);
} catch(Exception $e) {
	http_response_code(400);
	echo json_encode(array('success' => false, 'msg' => $e->getMessage()));
}