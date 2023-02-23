$(".go").on("click", "button.openLabel", function () {
    var idLabels = $(this).attr("idLabels");
    var idLanguages = $(this).attr("idLanguages");
    window.location = "index.php?route=show-label&idLabels=" + idLabels + "&idLanguages=" + idLanguages;
})

$(".go").on("click", "button.back", function () {
    var idLanguages = $(this).attr("idBack");
    window.location = "index.php?route=list-labels&idLanguage=" + idLanguages;
})
