function listar(idEmpresa) {
	$.ajax({
		url: 'Services/ListarVendaConselho.php',
		dataType: 'json',
		data : { 'dash' : true }
	}).done(function(vendas) {
		if (!displayErrors(vendas)) {
                        var total = 0.0;

			$.each(vendas, function() {
                                total = parseFloat(total) + parseFloat(this.valorDolar);
			});
                        $("#total").html(total.toString().replace(".", ","));
		}
	});

        $.ajax({
                url: 'Services/ListarGraficoPorcentagemHome.php',
                dataType: 'json'
        }).done(function(result) {
                if (!displayErrors(result)) {
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                          var data = google.visualization.arrayToDataTable(result);

                          var options = {
                            title: '% de Faturamento das Empresas'
                          };

                          var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                          chart.draw(data, options);
                        }
                }
        });

        $.ajax({
                url: 'Services/ListarGraficoListaHome.php',
                dataType: 'json'
        }).done(function(result) {
                if (!displayErrors(result)) {
                        google.charts.load('current', {'packages':['corechart', 'bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {

                          var data = new google.visualization.DataTable();
                          data.addColumn("string", "Empresa");
                          data.addColumn("number", "Faturamento");
                          data.addRows(result.length);

                          var i = 0;

                          $.each(result, function() {
				data.setValue(i, 0, this[0]);
				data.setValue(i, 1, this[1]);
                                i++;
                          });

                          var options = {
                            title: 'Lista das Empresas e o Total em Vendas'
                          };

                          var chart = new google.visualization.ColumnChart(
                            document.getElementById("chart_div"));
                          chart.draw(data, options);
                        }
                }
        });
}