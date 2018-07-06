function visualizar(idEmpresa) {
	$.ajax({
		url: 'Services/ListarVendaConselho.php',
		dataType: 'json',
		data: { 'idEmpresa': $.urlParam('idEmpresa') }
	}).done(function(vendas) {
		if (!displayErrors(vendas)) {
			$.each(vendas, function() {
				$('#listaVendas').append(
					$('<tr>').append(
						$('<td>', { 'text': this.cliente }),
						$('<td>', { 'text': this.data }),
						$('<td>', { 'text': "USD " + this.valorDolar }),
						$('<td>').append(
							$('<button>', { 'class': 'btn btn-success mr-3', 'text': 'Ver Detalhes', 'onClick': 'editar(' + this.id + ')' })
						)
					)
				)
			});
                        
                        $.ajax({
                                url: 'Services/ListarGraficoDetalhes.php',
                                dataType: 'json',
                                data: { 'idEmpresa': $.urlParam('idEmpresa') }
                        }).done(function(result) {
                                if (!displayErrors(result)) {
                                        google.charts.load('current', {'packages':['corechart']});
                                        google.charts.setOnLoadCallback(drawChart);

                                        function drawChart() {

                                          var data = google.visualization.arrayToDataTable(result);

                                          var options = {
                                            title: 'Fatia do Faturamento da Empresa'
                                          };

                                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                                          chart.draw(data, options);
                                        }
                                }
                        });

		}
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarVendaConselho.php',
		dataType: 'json'
	}).done(function(vendas) {
		if (!displayErrors(vendas)) {
			$.each(vendas, function() {
				$('#listaVendas').append(
					$('<tr>').append(
						$('<td>', { 'text': this.empresa }),
						$('<td>', { 'text': this.cliente }),
						$('<td>', { 'text': this.data }),
						$('<td>', { 'text': "USD " + this.valorDolar }),
						$('<td>').append(
							$('<button>', { 'class': 'btn btn-success mr-3', 'text': 'Ver Detalhes', 'onClick': 'editar(' + this.id + ')' })
						)
					)
				)
			});
		}
	});
}

function obter() {
	$.ajax({
		url: 'Services/ListarVendaConselho.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function(venda) {
		if (!displayErrors(venda)) {
			$('#data').val(venda.data);
			$('#valor').val(venda.valorDolar);
			$('#cotacaoDolar').val(venda.cotacaoDolar);
			$('#empresa').val(venda.empresa);
			$('#cliente').val(venda.cliente);
		}
	});
}

function obterEmpresas() {
	$.ajax({
		url: 'Services/ListarEmpresas.php',
		dataType: 'json'
	}).always(function(paises) {
		$.each(paises, function() {
			$('#idEmpresa').append(
				$('<option>', {
					'value': this.id,
					'text': this.nome
				})
			);
		});
	});
}

function editar(id) {
	window.location.replace('FormVendaConselho.php?id=' + id);
}

function vincularEventos() {
	$('#visualizar').click(function () {
                if($('#idEmpresa').val() != "0") {
                        window.location.replace('DetalhesEmpresa.php?idEmpresa=' + $('#idEmpresa').val());
                }
	});
}