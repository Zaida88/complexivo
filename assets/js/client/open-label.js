$(".go").on("click", "button.openListExercises", function () {
    var idLanguage = $(this).attr("idLanguages");
    var idLabel = $(this).attr("idLabel");
    window.location = "index.php?route=list-exercises&idLanguage=" + idLanguage + "&idLabel=" + idLabel;
})

$(".navigate").on("click", "button.back", function () {

    var idLanguage = $(this).attr("idLanguages");
    var numberLabel = $(this).attr("numberLabels");
    numberLabel = numberLabel - 1;
    window.location = "index.php?route=show-label&idLanguage=" + idLanguage + "&numberLabel=" + numberLabel;

})

$(".navigate").on("click", "button.front", function () {

    var idLanguage = $(this).attr("idLanguages");
    var numberLabel = $(this).attr("numberLabels");
    numberLabel = parseInt(numberLabel) + 1;
    window.location = "index.php?route=show-label&idLanguage=" + idLanguage + "&numberLabel=" + numberLabel;

})