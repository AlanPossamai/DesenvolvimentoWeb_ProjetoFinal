$(function() {
	listar();
});

function listar() {
	$.ajax({
		url: 'Services/ListarPaises.php',
	}).done(function(data) {
		console.log(data);
	});
}