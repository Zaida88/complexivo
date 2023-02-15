$(".code").on("click", "a.editbtn", function () {

  var idLenguage = $(this).attr("idLenguage");
  var data = new FormData();
  data.append("idLenguage", idLenguage);

  $.ajax({
      url: "views/admin/dashboard-admin.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
          $("#idLenguage").val(data["id_lenguage"]);
          $("#nameLanguage").val(data["name_language"]);
          $("#descriptionLanguage").val(data["description_language"]);
      }
  })

})
