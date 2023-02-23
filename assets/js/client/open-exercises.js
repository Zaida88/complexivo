$(".go").on("click", "button.openExercise", function () {
    var idExercise = $(this).attr("idExercise");
    var idLanguage = $(this).attr("idLanguage");
    var idLabel = $(this).attr("idLabel");
    window.location = "index.php?route=exercise-cards&idExercise=" + idExercise + "&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
})
