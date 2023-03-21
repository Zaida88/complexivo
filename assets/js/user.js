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

  $('.users').DataTable({
	  "ajax": "views/admin/data/table-user.php",
	  "deferRender": true,
	  "retrieve": true,
	  "processing": true,
	  "language": {
		  "sProcessing": "Procesando...",
		  "sLengthMenu": "<b style='color:black;'>Mostrar _MENU_ registros</b>",
		  "sZeroRecords": "No se encontraron resultados",
		  "sEmptyTable": "Ningún dato disponible en esta tabla",
		  "sInfo": "<b style='color:black;'>Mostrando registros del _START_ al _END_ de un total de _TOTAL_</b>",
		  "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		  "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		  "sInfoPostFix": "",
		  "sSearch": "<b style='color:black;'>Buscar:</b>",
		  "sUrl": "",
		  "sInfoThousands": ",",
		  "sLoadingRecords": "Cargando...",
		  "oPaginate": {
			  "sFirst": "Primero",
			  "sLast": "Último",
			  "sNext": "Siguiente",
			  "sPrevious": "Anterior"
		  },
		  "oAria": {
			  "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		  }
  
	  }
  
  });

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".users").on("click", ".btnActivate", function(){

	var idUser = $(this).attr("idUser");
	var stateUser = $(this).attr("stateUser");

	var datos = new FormData();
 	datos.append("activateId", idUser);
  	datos.append("userActivate", stateUser);

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
			      title: "El estado se actualizo correctamente",
			      type: "success",
			      confirmButtonText: "¡ok!"
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


