$(".nuevoLogo").change(function () {
	var logo = this.files[0];


	var datosLogo = new FileReader;
	datosLogo.readAsDataURL(logo);

	$(datosLogo).on("load", function (event) {

		var rutaLogo = event.target.result;

		$(".previsualizarEditar").attr("src", rutaLogo);

	})
})

/*=============================================
EDITAR INFORMACION
=============================================*/
$(".tablas").on("click", "button.btnUpdateProyect", function () {

	var idProyect = $(this).attr("idProyect");

	var datos = new FormData();
	datos.append("idProyect", idProyect);

	$.ajax({
		url: "ajax/informacion-fundacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarMision").val(respuesta["mision"]);
			$("#editarVision").val(respuesta["vision"]);
			$("#editarQuienesSomos").val(respuesta["quienes_somos"]);
			$("#logoActual").val(respuesta["logo"]);
			$("#idProyect").val(respuesta["id"]);

			if (respuesta["logo"] != "") {

				$(".previsualizarEditar").attr("src", respuesta["logo"]);

			} else {

				$(".previsualizarEditar").attr("src", "vistas/img/logo/default/logo-default.jpg");

			}
		}
	})
})


/*=============================================
EDITAR TELEFONO
=============================================*/
$(".tablaTelefono").on("click", "button.btnEditarTelefono", function () {

	var idTelefono = $(this).attr("idTelefono");

	var datosTelefono = new FormData();
	datosTelefono.append("idTelefono", idTelefono);

	$.ajax({
		url: "ajax/telefono-fundacion.ajax.php",
		method: "POST",
		data: datosTelefono,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuestaTelefono) {
			$("#editarTelefono").val(respuestaTelefono["telefono"]);
			$("#idTelefono").val(respuestaTelefono["id"]);
		}
		
	})


})

/*=============================================
ELIMINAR TELEFONO
=============================================*/
$(".tablaTelefono").on("click", "button.btnEliminarTelefono", function () {

	var idTelefono = $(this).attr("idTelefono");

	swal({
		title: '¿Está seguro de borrar el telefono?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar telefono!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=informacion-fundacion&idTelefono=" + idTelefono;

		}

	})

})


/*=============================================
EDITAR CORREO
=============================================*/
$(".tablaCorreo").on("click", "button.btnEditarCorreo", function () {

	var idCorreo = $(this).attr("idCorreo");

	var datosCorreo = new FormData();
	datosCorreo.append("idCorreo", idCorreo);

	$.ajax({
		url: "ajax/correo-fundacion.ajax.php",
		method: "POST",
		data: datosCorreo,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuestaCorreo) {
			$("#editarCorreo").val(respuestaCorreo["correo"]);
			$("#idCorreo").val(respuestaCorreo["id"]);
		}
		
	})


})

/*=============================================
ELIMINAR CORREO
=============================================*/
$(".tablaCorreo").on("click", "button.btnEliminarCorreo", function () {

	var idCorreo = $(this).attr("idCorreo");

	swal({
		title: '¿Está seguro de borrar el correo?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar correo!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=informacion-fundacion&idCorreo=" + idCorreo;

		}

	})

})


/*=============================================
EDITAR DIRECCION
=============================================*/
$(".tablaDireccion").on("click", "button.btnEditarDireccion", function () {

	var idDireccion = $(this).attr("idDireccion");

	var datosDireccion = new FormData();
	datosDireccion.append("idDireccion", idDireccion);

	$.ajax({
		url: "ajax/direccion-fundacion.ajax.php",
		method: "POST",
		data: datosDireccion,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuestaDireccion) {
			$("#editarDireccion").val(respuestaDireccion["direccion"]);
			$("#idDireccion").val(respuestaDireccion["id"]);
		}
		
	})


})

/*=============================================
ELIMINAR DIRECCION
=============================================*/
$(".tablaDireccion").on("click", "button.btnEliminarDireccion", function () {

	var idDireccion = $(this).attr("idDireccion");

	swal({
		title: '¿Está seguro de borrar la dirección?',
		text: "¡Si no lo está puede cancelar la acción!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar dirección!'
	}).then(function (result) {

		if (result.value) {

			window.location = "index.php?ruta=informacion-fundacion&idDireccion=" + idDireccion;

		}

	})

})


