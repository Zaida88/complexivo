var idLanguages = $("#idLanguages").val();

$(search());
function search(labels)
{
	$.ajax({
		url : "views/client/data/data-label.php?idLanguages=" + idLanguages,
		type : 'POST',
		dataType : 'html',
		data : { labels: labels },
	})
	.done(function(result){
		$("#showLabels").html(result);
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