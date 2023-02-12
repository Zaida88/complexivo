$(".go").on("click", "button.createExercise", function () {
    $('#createExerciseModal').modal('show');
})

$(".cards").on("click", "button.createCards", function () {

    var select = document.getElementById("option").value;
    var i = "";
    var input = document.querySelector("#createdCard");

    input.innerHTML = '';
    for (i = 0; i < select; i++) {
        createInputs();
    }

    function createInputs() {
        var element = document.createElement('div');
        element.innerHTML = `
    <div class="form-floating">
        <input id="floatingInput" type="text" name="nameCode[]" class="form-control mb-2" placeholder="Tarjeta ${i + 1}" required/>
        <label/>Tarjeta ${i + 1}</label>
    </div>
    `;
        input.appendChild(element);
    }
});

$(".exercise").on("click", "button.updateExercise", function () {

    var idExercise = $(this).attr("idExercise");
    var data = new FormData();
    data.append("idExercise", idExercise);

    $.ajax({
        url: "views/admin/data-exercise.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data) {
            $("#idExercise").val(data["id_exercise"]);
            $("#language").val(data["idLanguage"]);
            $("#nameExercise").val(data["name_exercise"]);
            $("#descriptionExercise").val(data["description_exercise"]);
        }
    })

})

$(".exercise").on("click", "button.deleteExercise", function () {

    var idExercise = $(this).attr("idExercise");
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
            window.location = "index.php?routes=list-exercises&idLanguage=" + idLanguage + "&idExercise=" + idExercise;
        }
    })
})

$(".exercise").on("click", "button.openCards", function () {
    var idExercise = $(this).attr("idExercise");
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?routes=list-codes&idLanguage=" + idLanguage + "&idExercise=" + idExercise;
})
