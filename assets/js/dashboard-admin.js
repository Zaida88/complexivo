function updateLenguageform(data){
	d=data.split('||');

	$('#id_language').val(d[0]);
	$('#nameLanguage').val(d[1]);
	$('#descriptionLanguage').val(d[2]);
}

function updateLenguages(){

	id_language=$('#id_language').val();
	nameLanguage=$('#namelU').val();
	descriptionLanguage=$('#descriptionlU').val();

  string = "id_language=" + id_language +
            "&nameLanguage=" + nameLanguage +
            "&descriptionLanguage=" + descriptionLanguage ;
  $.ajax({
    type:"POST",
    url: "",
    data:string,
    success:function(r){
      if(r==1){
        $('#table').load()
      }
    }
  })
}