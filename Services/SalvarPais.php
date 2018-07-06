<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();
Authenticator::verifyPermission('gerenciar países');

try {
	$response = array('success' => false);

	if (isset($_GET['pais'])) {
		$paisRepository = new PaisRepository();
		$pais = new Pais($_GET['pais']);
		$isSaved = $paisRepository->save($pais);

		if ($isSaved) {
			 $response = array('success' => true);
		}
	}

	echo json_encode($response);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}