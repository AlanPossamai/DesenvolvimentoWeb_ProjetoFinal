function editar(id) {
	window.location.replace('FormUsuarioConselho.php?id=' + id);
}

function obter() {
	$.ajax({
		url: 'Services/ListarUsuarios.php',
		dataType: 'json',
		data: { 'id': $.urlParam('id') }
	}).done(function(usuario) {
		$('#nome').val(usuario.nome);
		$('#login').val(usuario.login);
		$('#senha').val('digite a senha');
		$('#confirmarSenha').val('digite a senha');
		$('#empresa').val(usuario.idEmpresa || 0).change().attr('disabled', true);
	});
}

function listar() {
	$.ajax({
		url: 'Services/ListarUsuarios.php',
		dataType: 'json'
	}).done(function(usuarios) {
		$.each(usuarios, function () {
			$('#listaUsuarios').append(
				$('<tr>').append(
					$('<td>', { 'text': this.nome }),
					$('<td>', { 'text': this.login }),
					$('<td>', { 'text': this.empresa }),
					$('<td>').append(
						$('<button>', { 'class': 'btn btn-success mr-3', 'text': 'Editar', 'onClick': 'editar(' + this.id + ')' }),
						$('<button>', { 'class': 'btn btn-danger', 'text': 'Excluir', 'onClick': 'excluir(' + this.id + ')' })
					)
				)
			);
		});
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
		if (data.success) {
			alert('Salvo com sucesso!');
			window.location.replace('ListaUsuariosConselho.php');
		} else {
			alert('Problemas ao salvar. ' + (data.msg || ''));
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
		if (data.success) {
			alert('Excluído com sucesso!');
			window.location.replace('ListaUsuariosConselho.php');
		} else {
			alert('Problemas ao excluir. ' + (data.msg || ''));
		}
	});
}

function obterEmpresas() {
	$.ajax({
		url: 'Services/ListarEmpresas.php',
		dataType: 'json'
	}).always(function(empresas) {
		$.each(empresas, function () {
			$('#empresa').append(
				$('<option>', {
					'value': this.id,
					'text': this.nome
				})
			);
		});
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