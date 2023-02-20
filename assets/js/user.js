$(".users").on("click", "button.updateUser", function () {

	var idUser = $(this).attr("idUser");
	var data = new FormData();
	data.append("idUser", idUser);
  
	$.ajax({
		url: "views/admin/data-user.php",
		method: "POST",
		data: data,  
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (data) {
			$("#idUser").val(data["id_user"]);
			$("#usernameUser").val(data["username_user"]);
			$("#emailUser").val(data["email_user"]);
			$("#idRole").val(data["idRol"]);
		}
	})
  
  })


/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".table").on("click", ".btnActivar", function(){

	var idUser = $(this).attr("idUser");
	var stateUser = $(this).attr("stateUser");

	var datos = new FormData();
 	datos.append("activarId", idUser);
  	datos.append("stateUser", stateUser);

  	$.ajax({

	  url:"views/admin/user-activate.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      		if(window.matchMedia("(max-width:767px)").matches){

	      		 swal({
			      title: "El usuario ha sido actualizado",
			      type: "success",
			      confirmButtonText: "¡Cerrar!"
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
