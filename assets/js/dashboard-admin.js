$(".languages").on("click", "button.updateLanguage", function () {

  var idLanguage = $(this).attr("idLanguage");
  var data = new FormData();
  data.append("idLanguage", idLanguage);

  $.ajax({
      url: "views/admin/data-dashboard.php",
      method: "POST",
      data: data,  
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
          $("#idLanguage").val(data["id_language"]);
          $("#nameLanguage").val(data["name_language"]);
          $("#descriptionLanguage").val(data["description_language"]);
          $("#startCodeLanguage").val(data["start_code_language"]);
          $("#endCodeLanguage").val(data["end_code_language"]);
      }
  })

})