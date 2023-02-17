$(".lenguages").on("click", "button.updateLenguage", function () {

  var idLenguage = $(this).attr("idLenguage");
  var data = new FormData();
  data.append("idLenguage", idLenguage);

  $.ajax({
      url: "views/admin/data-dashboard.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
          $("#idLenguage").val(data["id_language"]);
          $("#nameLenguage").val(data["name_language"]);
          $("#descriptionLenguage").val(data["description_language"]);
      }
  })

})