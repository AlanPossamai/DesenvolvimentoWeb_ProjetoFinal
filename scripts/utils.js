var body = $("body");
$(document).on({
	ajaxStart: function () {
		body.addClass("loading");
	},
	ajaxStop: function () {
		body.removeClass("loading");
	}
});

$.urlParam = function(name) {
	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
	return (results ? results[1] || 0 : false);
}

function getFormData(form) {
	var formArray = form.serializeArray();
	var formData = {};

	$.map(formArray, function (key, val) {
		formData[key['name']] = key['value'];
	});

	return formData;
}

function verificarLogin() {
	$.ajax({
		url: 'Services/VerificaLogin.php',
		dataType: 'json'
	}).done(function(response) {
		if (! response) {
			alert('Você não está logado!');
			window.location.assign('./index.php');
		}
	});
}

function displayErrors(response) {
	if (response.errorMessage || response.responseText) {
		alert(response.errorMessage || response.responseText);

		return true;
	}

	return false;
}
function alert(msg) {
	var modal = $('<div>', { 'id': 'modal', 'class': 'modal fade', 'tabindex': '-1', 'role': 'dialog', 'aria-labelledby': 'modalLabel' }).append(
		$('<div>', { 'class': 'modal-dialog', 'role': 'document' }).append(
			$('<div>', { 'class': 'modal-content' }).append(
				$('<div>', { 'class': 'modal-header' }).append(
					$('<h5>', { 'id': 'modalLabelmodal', 'class': 'modal-title', 'text': 'Atenção' }),
					$('<button>', { 'type': 'button', 'class': 'close', 'data-dismiss': 'modal', 'aria-label': 'Close' }).append(
						$('<span>', { 'aria-hidden': 'true', 'html': '&times;' })
					)
				),
				$('<div>', { 'id': 'modalBodymodal', 'class': 'modal-body', 'html': '' }),
				$('<div>', { 'class': 'modal-footer' }).append(
					$('<button>', {
						'type': 'button',
						'class': 'btn btn-primary',
						'text': 'OK',
						'id': 'modalBtnOk',
						'click': function () {
							destroyModal('modal');
						}
					})
				)
			)
		)
	);

	modal.modal({ backdrop: 'static' })
		.on('shown.bs.modal', function () {
			$('#modalBodymodal').append($('<div>' + msg + '</div>'));
		})
		.on('hide.bs.modal', function () {
			jQuery(this).remove();
		})
		.on('hidden.bs.modal', function () {
			jQuery(this).remove();
		});

	$('#modal').modal('handleUpdate');
}

function destroyModal(id) {
	id = (id || 'modal');
	$('#' + id).modal('hide').data('bs.modal', null);
}

// MANIPULAÇÃO DE COOKIES

/**
 * @author Mário Valney <mariovalney@gmail.com>
 * Adapted by Alan Possamai <alanp5sa@gmail.com>
 */
function setCookie(name, value, duration) {
	var cookie = name + "=" + escape(value) +
		((duration) ? "; duration=" + duration.toUTCString() : "");

	document.cookie = cookie;
}

/**
 * @author Mário Valney <mariovalney@gmail.com>
 */
function getCookie(name) {
	var cookies = document.cookie;
	var prefix = name + "=";
	var begin = cookies.indexOf("; " + prefix);

	if (begin == -1) {

		begin = cookies.indexOf(prefix);

		if (begin != 0) {
			return null;
		}

	} else {
		begin += 2;
	}

	var end = cookies.indexOf(";", begin);

	if (end == -1) {
		end = cookies.length;
	}

	return unescape(cookies.substring(begin + prefix.length, end));
}