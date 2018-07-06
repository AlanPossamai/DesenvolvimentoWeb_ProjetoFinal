function editar(id) {
	window.location.replace('FormPais.php?id=' + id);
}

function obterPais() {
	$.ajax({
		url: 'Services/ListarPaises.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function (pais) {
		if (!displayErrors(pais)) {
			$('#nome').val(pais.nome);
			$('#moeda').val(pais.moeda);
			$('#codigoMoeda').val(pais.codigo_moeda);
		}
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarPaises.php',
		dataType: 'json'
	}).done(function (paises) {
		if (!displayErrors(paises)) {
			$.each(paises, function () {
				$('#listaPaises').append(
					$('<tr>').append(
						$('<td>', { 'text': this.nome }),
						$('<td>', { 'text': this.moeda }),
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
	var pais = getFormData($('#formPais'));

	if (pais.nome.trim() == '') {
		alert('Preencha o nome do país');
		return false;
	} else if (pais.moeda.trim() == '') {
		alert('Preencha a moeda do país');
		return false;
	} else if (pais.codigo_moeda.trim() == '') {
		alert('Preencha o código da moeda');
		return false;
	}

	$.ajax({
		url: 'Services/SalvarPais.php',
		dataType: 'json',
		data: { pais }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Salvo com sucesso!');
				window.location.replace('ListaPaises.php');
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
		url: 'Services/DeletarPais.php',
		dataType: 'json',
		data: { 'id': id }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Excluído com sucesso!');
				window.location.replace('ListaPaises.php');
			} else {
				alert('Problemas ao excluir. ' + (data.msg || ''));
			}
		}
	});
}

function adaptarCampos() {
	var idPais = $.urlParam('id');

	if (idPais > 0) {
		obterPais(idPais);
		$('#titulo').text('Editar país');
		$('#id').val(idPais);
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
		var pais = getFormData($('#formPais'));

		if (!pais.id) {
			alert('O país ainda não foi cadastrado');
			return false;
		}

		excluir(pais.id);
	});
}