<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}
Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$vendaRepository = new VendaRepository();

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$vendas = $vendaRepository->getById($_GET['id']);
		$vendas["data"] = DateFormatter::toView($vendas["data"]);
	} elseif (isset($_GET['empresa'])) {
		$vendas = $vendaRepository->getByEmpresa(Session::getInstance()->getByKey("idEmpresa"));

		foreach($vendas as $i => $venda) {
                        $vendas[$i]["valor"] = number_format($venda["valor"], 2, ",", ".");
			$vendas[$i]["data"] = DateFormatter::toView($venda["data"]);
		}
	} elseif (isset($_GET['dash'])) {
		$vendas = $vendaRepository->getByEmpresa(Session::getInstance()->getByKey("idEmpresa"));

		foreach($vendas as $i => $venda) {
                        $vendas[$i]["valor"] = $venda["valor"];
			$vendas[$i]["data"] = DateFormatter::toView($venda["data"]);
		}
	} else {
		throw new Exception("Bad Request");
	}

	echo json_encode($vendas);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}