$('.proyeditbtn').on("click", function(){
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
      return $(this).text();
    });
    $('#idProyect').val(data[0]);
    $('#nameProyect').val(data[1]);
    $('#descriptionProyect').val(data[2]);
    $('#phoneNumberProyect').val(data[3]);
    $('#emailProyect').val(data[4]);
  })
  