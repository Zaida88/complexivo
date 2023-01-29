$(".newLogo").change(function () {

	var logo = this.files[0];


	var dataLogo = new FileReader;
	dataLogo.readAsDataURL(logo);

	$(dataLogo).on("load", function (event) {

		var rutaLogo = event.target.result;

		$(".previsualizarEditar").attr("src", rutaLogo);

	})
})

/*=============================================
EDITAR INFORMACION
=============================================*/
$(".table").on("click", "button.btnUpdateProyect", function () {

	var idProyect = $(this).attr("idProyect");

	var data = new FormData();
	data.append("idProyect", idProyect);

	$.ajax({
		url: "functions/proyect.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			$("#updateName").val(respuesta["name"]);
			$("#updateDescription").val(respuesta["description"]);
			$("#updateEmail").val(respuesta["email"]);
			$("#updatePhoneNumber").val(respuesta["phone_number"]);
			$("#logoActual").val(respuesta["logo"]);
			$("#idProyect").val(respuesta["id"]);

			if (respuesta["logo"] != "") {

				$(".previsualizarEditar").attr("src", respuesta["logo"]);

			} else {

				$(".previsualizarEditar").attr("src", "assets/img/proyect/logo/imgp.png");

			}
		}
	})
})
