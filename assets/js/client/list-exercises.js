$(".eye").on("click", "button.showHidden", function () {
    var idLabel = $(this).attr("idLabel");
    if ($('.icon').hasClass("fa fa-eye")) {
        window.location = "index.php?route=list-exercises-filter&idLabel=" + idLabel;

    } else {
        window.location = "index.php?route=list-exercises&idLabel=" + idLabel;

    }
})

$(".go").on("click", "button.back", function () {
    var idLabels = $(this).attr("idLabels");
    window.location = "index.php?route=show-label&idLabel=" + idLabels;
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