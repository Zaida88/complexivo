$(".newLogo").change(function () {

	var img = this.files[0];
	var newImg = new FileReader;

	newImg.readAsDataURL(img);

	$(newImg).on("load", function (event) {
		var route = event.target.result;
		$(".previewImg").attr("src", route);
	})
})