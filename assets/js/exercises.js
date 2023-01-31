$(".go").on("click", "button.openExercise", function () {
    var idExercise = $(this).attr("idExercise");
    window.location = "index.php?routes=exercise&idExercise=" + idExercise;

})