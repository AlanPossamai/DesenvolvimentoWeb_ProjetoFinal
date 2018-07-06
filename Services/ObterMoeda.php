<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$paisRepository = new PaisRepository();
        $result = $paisRepository->getById(Session::getInstance()->getByKey("idEmpresa"));

	echo json_encode($result);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}