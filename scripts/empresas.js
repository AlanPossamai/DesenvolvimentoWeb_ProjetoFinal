function editar(id) {
	window.location.replace('FormEmpresa.php?id=' + id);
}

function obter() {
	$.ajax({
		url: 'Services/ListarEmpresas.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function(empresa) {
		if (!displayErrors(empresa)) {
			$('#nome').val(empresa.nome);
			$('#pais').val(empresa.idPais).change();
		}
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarEmpresas.php',
		dataType: 'json'
	}).done(function(empresas) {
		if (!displayErrors(empresas)) {
			$.each(empresas, function() {
				$('#listaEmpresas').append(
					$('<tr>').append(
						$('<td>', { 'text': this.nome }),
						$('<td>', { 'text': this.pais }),
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
	var empresa = getFormData($('#formEmpresa'));

	if (empresa.nome.trim() == '') {
		alert('Preencha o nome da empresa!');
		return false;
	} else if (empresa.idPais <= 0) {
		alert('Selecione o país da empresa!');
		return false;
	}

	$.ajax({
		url: 'Services/SalvarEmpresa.php',
		dataType: 'json',
		data: { empresa }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Empresa salva com sucesso!');
				window.location.replace('ListaEmpresas.php');
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
		url: 'Services/DeletarEmpresa.php',
		dataType: 'json',
		data: { 'id': id }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Excluída com sucesso!');
				window.location.replace('ListaEmpresas.php');
			} else {
				alert('Problemas ao excluir. ' + (data.msg || ''));
			}
		}
	});
}

function obterPaises() {
	$.ajax({
		url: 'Services/ListarPaises.php',
		dataType: 'json'
	}).always(function(paises) {
		if (!displayErrors(paises)) {
			$.each(paises, function() {
				$('#pais').append(
					$('<option>', {
						'value': this.id,
						'text': this.nome
					})
				);
			});
		}
	});
}

function adaptarCampos() {
	var idEmpresa = $.urlParam('id');

	if (idEmpresa > 0) {
		obter(idEmpresa);
		$('#titulo').text('Editar empresa');
		$('#id').val(idEmpresa);
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
		var empresa = getFormData($('#formEmpresa'));

		if (! empresa.id) {
			alert('A empresa ainda não foi cadastrada!');
			return false;
		}

		excluir(empresa.id);
	});
}