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
            $("#nameExercise").val(data["name_exercise"]);
            $("#descriptionExercise").val(data["description_exercise"]);
        }
    })

})