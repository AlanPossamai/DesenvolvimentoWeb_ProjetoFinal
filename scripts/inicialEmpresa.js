function listar() {
	$.ajax({
		url: 'Services/ListarVenda.php',
		dataType: 'json',
		data: { 'dash': true }
	}).done(function(vendas) {
		if (!displayErrors(vendas)) {
			var total = 0.0;

			$.each(vendas, function() {
				total = parseFloat(total) + parseFloat(this.valor);
			});

			$("#total").html(total.toString().replace(".", ","));
		}
	});

	$.ajax({
		url: 'Services/ObterMoeda.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function (pais) {
		if (!displayErrors(pais)) {
			$('#moeda').html(pais.codigo_moeda);
			$.ajax({
				url: './Utils/currencyQuotes.php',
				dataType: 'json',
				data: { 'to': pais.codigo_moeda }
			}).always(function(result) {
				if (result.error) {
					$("#cotacao").html('<small style="color: red;">' + result.error + '</small>');
				} else {
					$("#cotacao").html(result.toFixed(2).toString().replace(".", ","));
				}
			});
		}
	});
}