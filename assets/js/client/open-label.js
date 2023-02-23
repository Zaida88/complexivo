$(".go").on("click", "button.openLabel", function () {
    var idLabels = $(this).attr("idLabels");
    window.location = "index.php?route=show-label&idLabels=" + idLabels;

})
