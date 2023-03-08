$(".go").on("click", "button.back", function () {
    var idLanguage = $(this).attr("idLanguages");
    var numberLabel = $(this).attr("numberLabel");
    window.location = "index.php?route=show-label&idLanguage=" + idLanguage+ "&numberLabel=" + numberLabel;
})


var idUsers = $("#idUsers").val();
var label = $("#id_label").val();

$(search());
function search(labels)
{
	$.ajax({
		url : "views/client/data/data-exercise.php?idUsers=" + idUsers + "&label=" + label,
		type : 'POST',
		dataType : 'html',
		data : { labels: labels },
	})
	.done(function(result){
		$("#showExercises").html(result);
	})
}

$(document).on('keyup', '#search', function()
{
	var value=$(this).val();
	
	if (value!="")
	{
		search(value);
	}
	else
	{
		search();
	}
});

$(document).ready(function() {
	$(search());
});