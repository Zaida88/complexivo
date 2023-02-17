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
		if (isset($_POST["updateLenguage"])) { 
            if (
                isset($_POST["nameLenguage"]) &&
                isset($_POST["descriptionLenguage"])
            ) {
                $table = "languages";
                $data = array(
                    "id_language" => $_POST["idLenguage"],
                    "name_language" => $_POST["nameLenguage"],
                    "description_language" => $_POST["descriptionLenguage"]
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