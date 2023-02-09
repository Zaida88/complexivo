$(".go").on("click", "button.createExercise", function () {
    $('#createExerciseModal').modal('show');
})

'use strict'

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
        <input id="floatingInput" type="text" name="nameCode" class="form-control mb-2" placeholder="Tarjeta ${i + 1}" required/>
        <label for="floatingInput" name="numberCode" value="${i + 1}"/>Tarjeta ${i + 1}</label>
    </div>
    `;
        input.appendChild(element);
    }
});