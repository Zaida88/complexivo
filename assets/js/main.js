$(".newPhoto").change(function () {

	var logo = this.files[0];


	var datosLogo = new FileReader;
	datosLogo.readAsDataURL(logo);

	$(datosLogo).on("load", function (event) {

		var rutaLogo = event.target.result;

		$(".previewImg").attr("src", rutaLogo);

	})
})