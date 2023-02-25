var idLanguages = $("#idLanguages").val();

$('.labels').DataTable({
    "ajax": "views/admin/data/table-labels.php?idLanguages=" + idLanguages,
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

$(".labels").on("click", "button.deleteLabel", function () {

    var idLabel = $(this).attr("idLabel");
    var idLanguage = $(this).attr("idLanguage");

    swal({
        title: "¿Está seguro de borrar registro?",
        text: "Esta accion no se podrá revertir",
        icon: "warning",
        buttons: [
            'No',
            'Si, eliminar'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            window.location = "index.php?route=list-labels&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
        }
    })
})