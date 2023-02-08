$('.proyeditbtn').on("click", function(){
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
      return $(this).text();
    });
    $('#idProyect').val(data[4]);
    $('#nameProyect').val(data[3]);
    $('#descriptionProyect').val(data[2]);
    $('#phoneNumberProyect').val(data[1]);
    $('#emailProyect').val(data[0]);
  })
  