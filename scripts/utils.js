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