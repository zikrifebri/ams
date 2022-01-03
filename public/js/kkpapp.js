$(document).ready(function(){

$('div.alert').not('.alert-important').delay(5000).slideUp(300);

	$("#form-pencarian").submit(function() {
		$("#id_departement option[value='']")
		.attr("disabled", "disabled");

		return true;
	});
});