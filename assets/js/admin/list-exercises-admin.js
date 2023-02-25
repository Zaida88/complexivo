var idLabels = $("#idLabels").val();
$('.exercises').DataTable({
    "ajax": "views/admin/data/table-exercises.php?idLabels=" + idLabels,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
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
        <input onkeypress="return event.charCode != 34" id="floatingInput" type="text" name="nameCode[]" class="form-control mb-2" placeholder="Tarjeta ${i + 1}" required/>
        <label/>Tarjeta ${i + 1}</label>
    </div>
    `;
        input.appendChild(element);
    }
});

$(".exercises").on("click", "button.updateExercise", function () {

    var idExercise = $(this).attr("idExercise");
    var data = new FormData();
    data.append("idExercise", idExercise);

    $.ajax({
        url: "views/admin/data/data-exercise.php",
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

$(".exercises").on("click", "button.deleteExercise", function () {

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
            window.location = "index.php?route=list-exercises&idLanguage=" + idLanguage + "&idExercise=" + idExercise;
        }
    })
})

$(".exercises").on("click", "button.openCards", function () {
    var idExercise = $(this).attr("idExercise");
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=list-codes&idLanguage=" + idLanguage + "&idExercise=" + idExercise;
})

$(".go").on("click", "button.back", function () {
    var idLanguage = $(this).attr("idLanguages");
    window.location = "index.php?route=list-labels&idLanguage=" + idLanguage;
})

