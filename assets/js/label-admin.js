$(".go").on("click", "button.createLabel", function () {
    $('#createLabelModal').modal('show');
})

$(".exercises").on("click", "button.deleteExercise", function () {

    var idLabel = $(this).attr("idLabel");
    var idLanguage = $(this).attr("idLanguage");
    swal({
        title: "¿Está seguro de borrar la etiqueta?",
        text: "Esta accion no se podrá revertir",
        icon: "warning",
        buttons: [
            'No',
            'Si, eliminar'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            window.location = "index.php?route=labels&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
        }
    })
})