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
                        console.log('http://free.currencyconverterapi.com/api/v5/convert?q=USD_' + pais.codigo_moeda + '&compact=y');
                        
                        $.ajax({
                                url: 'http://free.currencyconverterapi.com/api/v5/convert?q=USD_' + pais.codigo_moeda + '&compact=y',
                                dataType: 'json'
                        }).done(function(result) {
                                if (!displayErrors(result)) {
                                    $.each(result, function() {
                                        $("#cotacao").html(this.val.toFixed(2).toString().replace(".", ","));
                                    });
                                }
                        });
		}
	});
}