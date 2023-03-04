var idExercises = $("#exercise").val();
var rol = $("#rol").val();
$('.codes').DataTable({
    "ajax": "views/admin/data/table-codes.php?idExercises=" + idExercises + "&rol=" + rol,
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

$(".go").on("click", "button.createCode", function () {
    $('#createCodeModal').modal('show');
})

$(".go").on("click", "button.back", function () {
    var idLabels = $(this).attr("idLabels");
    window.location = "index.php?route=list-exercises&idLabel=" + idLabels;
})

$(".codes").on("click", "button.updateCode", function () {

    var idCode = $(this).attr("idCode");
    var data = new FormData();
    data.append("idCode", idCode);

    $.ajax({
        url: "views/admin/data/data-exercise.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            $("#idCode").val(data["id_code"]);
            $("#nameCode").val(data["name_code"]);
            $("#numberCode").val(data["number_code"]);
        }
    })

})

$(".codes").on("click", "button.deleteCode", function () {

    var idCode = $(this).attr("idCode");
    var idExercise = $("#exercise").val();

    swal({
        title: "¿Está seguro de borrar el registro?",
        text: "Esta accion no se podrá revertir",
        icon: "warning",
        buttons: [
            'No',
            'Si, eliminar'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            window.location = "index.php?route=list-codes&idExercise=" + idExercise + "&idCode=" + idCode;
        }
    })
})
