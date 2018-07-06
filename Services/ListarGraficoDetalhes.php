<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	$vendaRepository = new VendaRepository();

	if (isset($_GET['idEmpresa']) && !empty($_GET['idEmpresa'])) {
		$vendasEmpresa = $vendaRepository->getByEmpresa($_GET['idEmpresa']);
		$vendas = $vendaRepository->getAll();

                $nomeEmpresa = $vendasEmpresa[0]["empresa"];
                $totalEmpresa = 0;
                $totalOutros = 0;

                foreach($vendasEmpresa as $venda) {
                    $totalEmpresa += $venda["valor"] / $venda["cotacaoDolar"];
                }

                foreach($vendas as $venda) {
                    $totalOutros += $venda["valor"] / $venda["cotacaoDolar"];
                }

                $totalOutros -= $totalEmpresa;

                $result = array(array('Empresa', 'Faturamento'), array($nomeEmpresa, $totalEmpresa), array("Outros", $totalOutros));
	} else {
		throw new Exception("Bad Request");
	}

	echo json_encode($result);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}