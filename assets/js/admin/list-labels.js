var idLanguages = $("#idLanguages").val();
var rol = $("#rol").val();

$('.labels').DataTable({
    "ajax": "views/admin/data/table-labels.php?idLanguages=" + idLanguages + "&rol=" + rol,
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

$(".labels").on("click", "button.updateLabel", function () {

    var idLabel = $(this).attr("idLabel");
    var data = new FormData();
    data.append("idLabel", idLabel);

    $.ajax({
        url: "views/admin/data/data-label.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (result) {
            $("#name_label").val(result["name_label"]);
            $("#description_label").val(result["description_label"]);
            $("#idLabel").val(result["id_label"]);
            $("#imgLabel").val(result["img_label"]);
            $("#numberLabel").val(result["number_label"]);
            $(".previewImg").attr("src", result["img_label"]);
        }
    })
})

$(".labels").on("click", "button.detail", function () {

    var idLabel = $(this).attr("idLabel");
    var data = new FormData();
    data.append("idLabel", idLabel);

    $.ajax({
        url: "views/admin/data/data-label.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (result) {
            $("#detail_name_label").val(result["name_label"]);
            $("#detail_description_label").val(result["description_label"]);
            $("#detail_imgLabel").val(result["img_label"]);
            $(".previewImg").attr("src", result["img_label"]);
        }
    })
})

$(".labels").on("click", "button.deleteLabel", function () {

    var idLabel = $(this).attr("idLabel");
    var idLanguage = $(this).attr("idLanguage");

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
            window.location = "index.php?route=list-labels&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
        }
    })
})

$(".labels").on("click", "button.openExercises", function () {

    var idLabel = $(this).attr("idLabel");
    window.location = "index.php?route=list-exercises&idLabel=" + idLabel;

})