$('.go').on("click", function(){
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
      return $(this).text();
    });
    $('#id').val(data[0]);
    $('#name').val(data[1]);
    $('#description').val(data[2]);
  })