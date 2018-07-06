function editar(id) {
	window.location.replace('FormVenda.php?id=' + id);
}

function obter() {
	$.ajax({
		url: 'Services/ListarVenda.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function(venda) {
		if (!displayErrors(venda)) {
			$('#data').val(venda.data);
			$('#valor').val(venda.valor);
			$('#cotacaoDolar').val(venda.cotacaoDolar);
			$('#empresa').val(venda.idEmpresa);
			$('#cliente').val(venda.idCliente).change();
		}

		$.ajax({
			url: 'Services/ObterMoeda.php',
			dataType: 'json',
			data: { 'id': $.urlParam('id') }
		}).done(function (moeda) {
			$('#moeda').html(' (' + moeda.codigo_moeda + ')');
		});
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarVenda.php',
		dataType: 'json',
		data: { 'empresa': true }
	}).done(function(vendas) {
		if (!displayErrors(vendas)) {
                        $.ajax({
                                url: 'Services/ObterMoeda.php',
                                dataType: 'json',
                                data: { 'id': $.urlParam('id') }
                        }).done(function (pais) {
                                if (!displayErrors(pais)) {
                                        $.each(vendas, function() {
                                                $('#listaVendas').append(
                                                        $('<tr>').append(
                                                                $('<td>', { 'text': this.cliente }),
                                                                $('<td>', { 'text': this.data }),
                                                                $('<td>', { 'text': pais.codigo_moeda + " " + this.valor }),
                                                                $('<td>').append(
                                                                        $('<button>', { 'class': 'btn btn-success mr-3', 'text': 'Editar', 'onClick': 'editar(' + this.id + ')' }),
                                                                        $('<button>', { 'class': 'btn btn-danger', 'text': 'Excluir', 'onClick': 'excluir(' + this.id + ')' })
                                                                )
                                                        )
                                                )
                                        });
                                }
                        });
		}
	});
}

function salvar() {
	var venda = getFormData($('#formVenda'));

		if (venda.data.trim() == '') {
			alert('Preencha a data da venda!');
			return false;
		}

		if (venda.valor.trim() == '') {
			alert('Preencha o valor da venda!');
			return false;
		}

		if (venda.cotacaoDolar.trim() == '') {
			alert('Preencha a cotação do dólar para a venda!');
			return false;
		}

		if (venda.idCliente.trim() == '') {
			alert('Selecione o cliente!');
			return false;
		}

	$.ajax({
		url: 'Services/SalvarVenda.php',
		dataType: 'json',
		data: { venda }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Venda salva com sucesso!');
				window.location.replace('ListaVendas.php');
			} else {
				alert('Problemas ao salvar. ' + (data.msg || ''));
			}
		}
	});
}

function excluir(id) {
	if (!confirm('Confirme a exclusão')) {
		return false;
	}

	$.ajax({
		url: 'Services/DeletarVenda.php',
		dataType: 'json',
		data: { 'id': id }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Excluída com sucesso!');
				window.location.replace('ListaVendas.php');
			} else {
				alert('Problemas ao excluir. ' + (data.msg || ''));
			}
		}
	});
}

function obterClientes() {
	$.ajax({
		url: 'Services/ListarCliente.php',
		dataType: 'json',
		data: { 'empresa': true }
	}).always(function(paises) {
		$.each(paises, function() {
			$('#cliente').append(
				$('<option>', {
					'value': this.id,
					'text': this.nome
				})
			);
		});
	});
}

function adaptarCampos() {
	var idVenda = $.urlParam('id');

	if (idVenda > 0) {
		obter(idVenda);
		$('#nome').text('Editar venda');
		$('#id').val(idVenda);
		$('#excluir').show();
	} else {
		$('#excluir').hide();
	}
}

function vincularEventos() {
	$('#salvar').click(function () {
		salvar();
	});

	$('#excluir').click(function () {
		var venda = getFormData($('#formVenda'));

		if (! venda.id) {
			alert('a venda ainda não foi cadastrada!');
			return false;
		}

		excluir(venda.id);
	});
}