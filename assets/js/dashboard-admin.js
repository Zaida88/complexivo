$(".go").on("click", "a.openLanguage", function () {
    var idLanguage = $(this).attr("idLanguage");
    window.location = "updateLenguajesModal=" + idLanguage;

})