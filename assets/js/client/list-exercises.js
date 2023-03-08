$(".go").on("click", "button.back", function () {
	var idLanguage = $(this).attr("idLanguages");
	var numberLabel = $(this).attr("numberLabel");
	window.location = "index.php?route=show-label&idLanguage=" + idLanguage + "&numberLabel=" + numberLabel;
})

var idUsers = $("#idUsers").val();
var idLabel = $("#id_label").val();

$('.exercises').DataTable({
	"ajax": "views/client/data/table-exercises.php?idUser=" + idUsers + "&idLabel=" + idLabel,
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"contentType": "application/x-www-form-urlencoded;charset=utf-8",
	"language": {
		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

$(".exercises").on("click", "button.openExercise", function () {
    var numberExercise = $(this).attr("numberExercise");
    var idLanguage = $(this).attr("idLanguage");
    var idLabel = $(this).attr("idLabel");
    window.location = "index.php?route=exercise-cards&numberExercise=" + numberExercise + "&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
})
