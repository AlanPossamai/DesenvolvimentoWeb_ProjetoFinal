<?php

if (file_exists('../config.php')) {
	require_once '../config.php';
}

Authenticator::requireLogin();

try {
	sleep(mt_rand(0, 20) * 0.1);

	$empresaRepository = new EmpresaRepository();
	$vendaRepository = new VendaRepository();
        
        $empresas = $empresaRepository->getAll();
        
        $result = array();
        
        foreach($empresas as $empresa) {
		$vendas = $vendaRepository->getByEmpresa($empresa["id"]);
                $nomeEmpresa = $empresa["nome"];
                $totalEmpresa = 0;
                
                foreach($vendas as $venda) {
                    $totalEmpresa += $venda["valor"] / $venda["cotacaoDolar"];
                }
            
                array_push($result, array($nomeEmpresa, $totalEmpresa));
        }

	echo json_encode($result);
} catch(Exception $e) {
	http_response_code(400);
	echo $e->getMessage();
}