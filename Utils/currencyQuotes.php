<?php

const CURRENCY_QUOTE_API_URL = 'http://free.currencyconverterapi.com/api/v5/convert?';
$response = null;

if (isset($_GET['to']) && !empty($_GET['to'])) {
	$from = (isset($_GET['from']) ? $_GET['from'] : 'USD');
	$response = getQuote($from, $_GET['to']);
}

echo ($response ? $response : '{"error": "Não foi possível obter a cotação."}');

function getQuote($fromCurrency = 'USD', $toCurrency = 'BRL') {
	$currencysToConvert = $fromCurrency . '_' . $toCurrency;
	$getParams = array('q' => $currencysToConvert, 'compact' => 'y');
	$apiEndpoint = CURRENCY_QUOTE_API_URL . http_build_query($getParams);
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_PROXY => '10.1.0.3:3128',
		CURLOPT_PROXYUSERPWD => 'alan.090398:03754699075',
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $apiEndpoint,
		CURLOPT_HTTPHEADER => array(
			'Accept: application/json',
			'Content-Type: application/json',
		)
	));

	$quote = curl_exec($curl);

	if (! $quote) {
		$err = array(
			'error' => curl_error($curl),
			'code' => curl_errno($curl)
		);

		die(json_encode($err));
	}

	curl_close($curl);
	$quote = json_decode($quote, true);
	$quote = (isset($quote[$currencysToConvert]['val']) ? $quote[$currencysToConvert]['val'] : null);
	return $quote;
}