$('.go').on("click", function(){
    $div=$(this).closest('div');
    var data=$div.children("div").map(function(){
      return $(this).text();
    });
    $('#idLanguage').val(data[0]);
    $('#nameLanguage').val(data[1]);
    $('#descriptionLanguage').val(data[2]);
  })