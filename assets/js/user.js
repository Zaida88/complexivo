$('.editbtn').on("click", function(){
  $tr=$(this).closest('tr');
  var data=$tr.children("td").map(function(){
    return $(this).text();
  });
  $('#id').val(data[0]);
  $('#firstName').val(data[1]);
  $('#lastName').val(data[2]);
  $('#username').val(data[3]);
  $('#email').val(data[4]);
})






/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".code").on("click", "button.deleteUser", function () {

  var idUser = $(this).attr("idUser");

  swal({
      title: "¿Está seguro de borrar el usuario?",
      text: "Esta accion no se podrá revertir",
      icon: "warning",
      buttons: [
          'No',
          'Si, eliminar'
      ],
      dangerMode: true,
  }).then(function (isConfirm) {
      if (isConfirm) {
          window.location = "index.php?route=users&idUser=" + "&idUser=" + idUser;
      }
  })
})
