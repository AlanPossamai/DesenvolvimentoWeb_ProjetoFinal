function editar(id) {
	window.location.replace('FormUsuario.php?id=' + id);
}

function obter() {
	$.ajax({
		url: 'Services/ListarUsuarios.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function(usuario) {
		if (!displayErrors(usuario)) {
			$('#nome').val(usuario.nome);
			$('#login').val(usuario.login);
			$('#senha').val(usuario.senha);
			$('#confirmarSenha').val('');
			$('#empresa').val(usuario.idEmpresa || 0).change().attr('disabled', true);
		}
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarUsuarios.php',
		dataType: 'json'
	}).done(function(usuarios) {
		if (!displayErrors(usuarios)) {
			$.each(usuarios, function () {
				var fontweight = (this.empresa ? 'normal' : 'bold');

				$('#listaUsuarios').append(
					$('<tr>', { style: 'font-weight: ' + fontweight + ';' }).append(
						$('<td>', { 'text': this.nome }),
						$('<td>', { 'text': this.login }),
						$('<td>', { 'html': (this.empresa || 'CONSELHO') }),
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
	var usuario = getFormData($('#formUsuario'));
	usuario = $.extend({}, usuario, { 'idEmpresa': $('#empresa').val() });

	if (usuario.nome.trim() == '') {
		alert('Preencha o nome do usuário');
		return false;
	} else if (usuario.login.trim() == '') {
		alert('Preencha o login do usuário');
		return false;
	} else if (usuario.senha.trim() == '') {
		alert('Preencha a senha do usuário');
		return false;
	} else if (usuario.senha != usuario.confirmarSenha) {
		alert('As senhas não conferem!');
		return false;
	}

	$.ajax({
		url: 'Services/SalvarUsuario.php',
		dataType: 'json',
		data: { usuario }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Salvo com sucesso!');
				window.location.replace('ListaUsuarios.php');
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
		url: 'Services/DeletarUsuario.php',
		dataType: 'json',
		data: { 'id': id }
	}).always(function (data) {
		if (!displayErrors(data)) {
			if (data.success) {
				alert('Excluído com sucesso!');
				window.location.replace('ListaUsuarios.php');
			} else {
				alert('Problemas ao excluir. ' + (data.msg || ''));
			}
		}
	});
}

function obterEmpresas() {
	var idEmpresa = getCookie('idEmpresa');
	idEmpresa = (idEmpresa == 'null' ? 0 : idEmpresa);

	if (idEmpresa) {
		$('#empresa').hide().parent().hide();
	}

	$.ajax({
		url: 'Services/ListarEmpresas.php',
		dataType: 'json',
		data: { 'id': idEmpresa }
	}).always(function(empresas) {
		if (!displayErrors(empresas)) {
			if (idEmpresa) {
				$('#empresa').append(
					$('<option>', {
						'value': empresas.id,
						'text': empresas.nome
					})
				);

				$('#empresa').val(idEmpresa).change();
				return false;
			}

			$.each(empresas, function () {
				$('#empresa').append(
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
	var idUsuario = $.urlParam('id');

	if (idUsuario > 0) {
		obter(idUsuario);
		$('#titulo').text('Editar usuário');
		$('#id').val(idUsuario);
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
		var usuario = getFormData($('#formUsuario'));

		if (!usuario.id) {
			alert('O usuário ainda não foi cadastrado');
			return false;
		}

		excluir(usuario.id);
	});
}