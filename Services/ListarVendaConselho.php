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
                $vendas["valorDolar"] = $vendas["valor"] / $vendas["cotacaoDolar"];
                $vendas["valorDolar"] = number_format($vendas["valorDolar"], 2, ",", ".");
                $vendas["cotacaoDolar"] = number_format($vendas["cotacaoDolar"], 2, ",", ".");
	} elseif (isset($_GET['idEmpresa']) && !empty($_GET['idEmpresa'])) {
		$vendas = $vendaRepository->getByEmpresa($_GET['idEmpresa']);

		foreach($vendas as $i => $venda) {
			$vendas[$i]["data"] = DateFormatter::toView($venda["data"]);
			$vendas[$i]["valorDolar"] = $vendas[$i]["valor"] / $vendas[$i]["cotacaoDolar"];
                        $vendas[$i]["valorDolar"] = number_format($venda[$i]["valorDolar"], 2, ",", ".");
		}
	} else {
		$vendas = $vendaRepository->getAll();

		foreach($vendas as $i => $venda) {
			$vendas[$i]["data"] = DateFormatter::toView($venda["data"]);
			$vendas[$i]["valorDolar"] = $vendas[$i]["valor"] / $vendas[$i]["cotacaoDolar"];
                        $vendas[$i]["valorDolar"] = number_format(round($vendas[$i]["valorDolar"], 2), 2, ",", ".");
		}
	}

	echo json_encode($vendas);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}