function editar(id) {
	window.location.replace('FormCliente.php?id=' + id);
}

function obter() {
	$.ajax({
		url: 'Services/ListarCliente.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function(cliente) {
		if (!displayErrors(cliente)) {
			$('#nome').val(cliente.nome);
			$('#empresa').val(cliente.idEmpresa).change();
		}
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarCliente.php',
		dataType: 'json',
		data: { 'idEmpresa': 1 }
	}).done(function(clientes) {
		if (!displayErrors(clientes)) {
			$.each(clientes, function() {
				$('#listaClientes').append(
					$('<tr>').append(
						$('<td>', { 'text': this.nome }),
						$('<td>').append(
							$('<button>', { 'class': 'btn btn-success mr-3', 'text': 'Editar', 'onClick': 'editar(' + this.id + ')' }),
							$('<button>', { 'class': 'btn btn-danger', 'text': 'Excluir', 'onClick': 'excluir(' + this.id + ')' })
						)
					)
				);
			});
		}
	});
}

function salvar() {
	var cliente = getFormData($('#formCliente'));

	if (cliente.nome.trim() == '') {
		alert('Preencha o nome do cliente!');
		return false;
	}

	$.ajax({
		url: 'Services/SalvarCliente.php',
		dataType: 'json',
		data: { cliente }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Cliente salvo com sucesso!');
				window.location.replace('ListaClientes.php');
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
		url: 'Services/DeletarCliente.php',
		dataType: 'json',
		data: { 'id': id }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Excluída com sucesso!');
				window.location.replace('ListaClientes.php');
			} else {
				alert('Problemas ao excluir. ' + (data.msg || ''));
			}
		}
	});
}

function adaptarCampos() {
	var idCliente = $.urlParam('id');

	if (idCliente > 0) {
		obter(idCliente);
		$('#nome').text('Editar cliente');
		$('#id').val(idCliente);
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
		var cliente = getFormData($('#formCliente'));

		if (! cliente.id) {
			alert('o cliente ainda não foi cadastrado!');
			return false;
		}

		excluir(cliente.id);
	});
}