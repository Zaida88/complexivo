var user = $("#idUser").val();
$('.wins').DataTable({
	"ajax": "views/client/data/data-wins.php?idUser=" + user,
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {
		"sProcessing": "Procesando...",
		"sLengthMenu": "<b style='color:black;'>Mostrar _MENU_ registros</b>",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "<b style='color:black;'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_</b>",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "<b style='color:black;'>Buscar:</b>",
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