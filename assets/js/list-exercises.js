$(".go").on("click", "button.openExercise", function () {
    var idExercise = $(this).attr("idExercise");
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=exercise-cards&idExercise=" + idExercise + "&idLanguage=" + idLanguage;

})

$(".eye").on("click", "button.showHidden", function () {
    var idLanguage = $(this).attr("idLanguage");
    if ($('.icon').hasClass("fa fa-eye")) {
        window.location = "index.php?route=list-exercises-filter&idLanguage=" + idLanguage;

    } else {
        window.location = "index.php?route=list-exercises&idLanguage=" + idLanguage;

    }
})
