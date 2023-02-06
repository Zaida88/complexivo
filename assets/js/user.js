/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".table").on("click", ".btnDeleteUser", function(){

    var id = $(this).attr("id");
    var photoUser = $(this).attr("photoUser");
    var username = $(this).attr("username");
  
    swal({
      title: '¿Está seguro de borrar el usuario?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=users&id="+id+"&username="+username+"&photoUser="+photoUser;
  
      }
  
    })
})  