const list = document.getElementById('list');

Sortable.create(list, {});

function check() {
    var x = document.getElementsByTagName("input").length;
    var show;
    for (i = 0; i < x; i++) {
        show += " " + document.getElementsByTagName("input")[i].value;
    }
    show = show.substring(10);
    var stringAsArray = show.split(" ");
    var stringAsArray2 = show.split(" ");
    stringAsArray.sort();
    var result = (compareArrays(stringAsArray, stringAsArray2));
    if (result) {

        $(function () {
            var idExercises = $("#idExercises").val();
            var idUser = $("#idUser").val();
            $.ajax({
                url: "views/client/data/data-save-status.php?idExercises=" + idExercises + "&idUser=" + idUser,
                method: "POST",
                dataType: 'html',
                data: { exercises: idExercises },
            })
                .done(function (result) {
                    $("#showMessage").html(result);
                    document.getElementById("exerciseContent").style.display = "none";
                    document.getElementById("resultCorrect").style.display = "block";
                })
        });

    } else {
        document.getElementById("exerciseContent").style.display = "none";
        document.getElementById("resultIncorrect").style.display = "block";
    }
    function compareArrays(array1, array2) {
        var i, isA1, isA2;
        isA1 = Array.isArray(array1);
        isA2 = Array.isArray(array2);

        if (isA1 !== isA2) {
            return false;
        }
        if (!(isA1 && isA2)) {
            return array1 === array2;
        }
        if (array1.length !== array2.length) {
            return false;
        }
        for (i = 0; i < array1.length; i += 1) {
            if (!compareArrays(array1[i], array2[i])) {
                return false;
            }
        }
        return true;
    }
}

$(".go").on("click", "button.back", function () {
    var idLabel = $(this).attr("idLabel");
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=list-exercises&idLabel=" + idLabel+ "&idLanguage=" + idLanguage;
})

$(".result").on("click", "button.recharge", function () {
    location.reload();
})

$(".result").on("click", "button.next", function () {
    var idLabel = $(this).attr("idLabel");
    var numberExercise = $(this).attr("numberExercise");
    numberExercise = parseInt(numberExercise) + 1;
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=exercise-cards&numberExercise=" + numberExercise + "&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
})


$(".result").on("click", "button.openAnother", function () {
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=list-labels&idLanguage=" + idLanguage;
})