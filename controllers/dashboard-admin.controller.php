<?php
class DashboardAdminController
{
    static public function ctrShowLanguages($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlShowLanguages($table, $item, $value);
        return $result;

    }

    static public function ctrUpdateLanguages()
	{
		if (isset($_POST["updateLanguage"])) { 
            if (
                isset($_POST["nameLanguage"]) &&
                isset($_POST["descriptionLanguage"])
            ) {
                $table = "languages";
                $data = array(
                    "id_language" => $_POST["idLanguage"],
                    "name_language" => $_POST["nameLanguage"],
                    "description_language" => $_POST["descriptionLanguage"]
                );
                $results = LanguagesModel::mdlUpdateLanguages($table, $data);

                if ($results == "ok") {
                    echo '<script>
                	swal("Actualizado con exito", "", "success")
                	.then((value) => {
                		window.location = "dashboard-admin"
                	});
                		 </script>';
                }


            } else {
                echo '<script>
				swal("Error al actualizar", "", "error")
				.then((value) => {
                    window.location = "dashboard-admin"

				});
					 </script>';
            }
        }		
	}
}
?>