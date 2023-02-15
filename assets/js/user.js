$(".newLogo").change(function () {

	var img = this.files[0];
	var newImg = new FileReader;

	newImg.readAsDataURL(img);

	$(newImg).on("load", function (event) {
		var route = event.target.result;
		$(".previewImg").attr("src", route);
	})
})


function updateUserform(data){
	d=data.split('||');

	$('#id_user').val(d[0]);
	$('#nameu').val(d[1]);
	$('#emailu').val(d[2]);
	$('#nameRol').val(d[3]);
}

/*=============================================
ACTIVAR USUARIO
=============================================*/
function changeStateUser(id_user, state_user){
	$.ajax({
		type: "POST",
		data: "id_user=" + id_user + "&state_user=" + state_user,
		url: "views/admin/user-activate.php",
		success:function(result){
			result = result.trim();
			if(result == 1){
				Swal.fire("Se actualizo exitosamente el estado", "success");
			}else{
				Swal.fire("Error al actualizar el estado" + result, "error");
			}
		}


	});

}





/*=============================================
$(".table").on("click", ".btnActivar", function(){

	var idUser = $(this).attr("idUser");
	var stateUser = $(this).attr("stateUser");

	var datos = new FormData();
 	datos.append("activarId", idUser);
  	datos.append("activarUsuario", stateUser);

  	$.ajax({

	  url:"views/admin/user-activate.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(result){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario se actualizado correctamente",
			      type: "success",
			      confirmButtonText: "¡Aceptar!"
			    }).then(function(result) {
			        if (result.value) {

			        	window.location = "users";

			        }


				});

	      	}

      }

  	})

  	if(stateUser == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('stateUser',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('stateUser',0);

  	}

})

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
=============================================*/

