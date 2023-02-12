$(".go").on("click", "button.createCode", function () {
    $('#createCodeModal').modal('show');
})

$(".code").on("click", "button.back", function () {
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=list-exercises&idLanguage=" + idLanguage;
})

$(".code").on("click", "button.updateCode", function () {

    var idCode = $(this).attr("idCode");
    var data = new FormData();
    data.append("idCode", idCode);

    $.ajax({
        url: "views/admin/data-exercise.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            $("#idCode").val(data["id_code"]);
            $("#language").val(data["idLanguage"]);
            $("#exercise").val(data["idExercise"]);
            $("#nameCode").val(data["name_code"]);
            $("#numberCode").val(data["number_code"]);
        }
    })

})

$(".code").on("click", "button.deleteCode", function () {

    var idCode = $(this).attr("idCode");
    var idLanguage = $(this).attr("idLanguage");
    var idExercise = $(this).attr("idExercise");

    swal({
        title: "¿Está seguro de borrar la tarjeta?",
        text: "Esta accion no se podrá revertir",
        icon: "warning",
        buttons: [
            'No',
            'Si, eliminar'
        ],
        dangerMode: true,
    }).then(function (isConfirm) {
        if (isConfirm) {
            window.location = "index.php?route=list-codes&idLanguage=" + idLanguage + "&idExercise=" + idExercise + "&idCode=" + idCode;
        }
    })
})
