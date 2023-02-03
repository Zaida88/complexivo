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
$(".proyect").on("click", "button.btnUpdateProyect", function () {

	var idProyect = $(this).attr("idProyect");

	var data = new FormData();
	data.append("idProyect", idProyect);

	$.ajax({
		url: "ajax/proyect.ajax.php",
		method: "POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (result) {
			$("#idProyect").val(result["id"]);
			$("#updateName").val(result["name"]);
			$("#updateDescription").val(result["description"]);
			$("#updateEmail").val(result["email"]);
			$("#updatePhoneNumber").val(result["phone_number"]);
			$("#updateCode").val(result["code"]);
			$("#logoActual").val(result["logo"]);

			if (result["logo"] != "") {

				$(".previsualizarEditar").attr("src", result["logo"]);

			} else {

				$(".previsualizarEditar").attr("src", "assets/img/proyect/logo/imgp.png");

			}
		}
	})
})
