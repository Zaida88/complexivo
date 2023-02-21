$(".eye").on("click", "button.showHidden", function () {
    var idLanguage = $(this).attr("idLanguage");
    if ($('.icon').hasClass("fa fa-eye")) {
        window.location = "index.php?route=list-exercises-filter&idLanguage=" + idLanguage;

    } else {
        window.location = "index.php?route=list-exercises&idLanguage=" + idLanguage;

    }
})

var idUsers = $("#idUsers").val();
var idLanguages = $("#idLanguages").val();

$(search());
function search(exercises)
{
	$.ajax({
		url : "views/client/data-exercise-filter.php?idUsers=" + idUsers + "&idLanguages=" + idLanguages,
		type : 'POST',
		dataType : 'html',
		data : { exercises: exercises },
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