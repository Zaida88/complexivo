$(".go").on("click", "button.openLabel", function () {
    var idLabels = $(this).attr("idLabels");
    window.location = "index.php?route=show-label&idLabel=" + idLabels;
})

$(".go").on("click", "button.back", function () {
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?route=list-labels&idLanguage=" + idLanguage;
})

$(".go").on("click", "button.openListExercises", function () {
    var idLabel = $(this).attr("idLabel");
    window.location = "index.php?route=list-exercises&idLabel=" + idLabel;
})