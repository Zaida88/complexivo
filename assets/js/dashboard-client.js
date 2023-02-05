$(".go").on("click", "a.openLanguage", function () {
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?routes=list-exercises&idLanguage=" + idLanguage;

})