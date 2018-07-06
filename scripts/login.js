$(function () {
	$('#btnLogin').click(function () {
		login();
	});
});

function login() {
	$.ajax({
		type: 'POST',
		url: 'Services/Auth.php',
		dataType: 'json',
		data: getFormData($('#formLogin'))
	}).always(function (response) {
		if (response.success) {
			setCookie('idEmpresa', response.idEmpresa, '');

			window.location.assign('./InicialEmpresa.php');
		} else if (response.errorMessage) {
			alert('Não foi possível logar: ' + response.errorMessage);
		} else {
			alert('Não foi possível logar: ' + response.responseText);
		}
	});
}