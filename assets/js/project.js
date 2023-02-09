$('.proyeditbtn').on("click", function(){
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
      return $(this).text();
    });
    $('#idProject').val(data[4]);
    $('#nameProject').val(data[3]);
    $('#descriptionProject').val(data[2]);
    $('#phoneNumberProject').val(data[1]);
    $('#emailProject').val(data[0]);
  })
  