$('.go').on("click", function(){
  $idLanguage=$(this).attr("idLanguage");
  var data=$div.children("div").map(function(){
    return $(this).text();
  });
  $('#idLanguage').val(data[0]);
  $('#nameLanguage').val(data[1]);
  $('#descriptionLanguage').val(data[2]);
})

  $(".go").on("click", "a.openLanguage", function () {
    var idLanguage = $(this).attr("idLanguage");
    window.location = "index.php?routes=list-&idLanguage=" + idLanguage;

})