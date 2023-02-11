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
				isset ($_POST['idLanguage'])&&
                isset ($_POST["nameLanguage"])&& 
                isset ($_POST["descriptionLanguage"])
               ){
					$table = "languages";
					$data = array(
						"id_language" => $_GET["id_language"],
						"name_language" => $_POST["nameLanguage"],
						"description_language" => $_POST["descriptionLanguage"],
					);

					$results = LanguagesModel::mdlUpdateLanguages($table, $item, $value);
                    $_SESSION["id_language"] = $_GET["id_language"];
                    $_SESSION["name_language"] = $_POST["nameLanguage"];
                    $_SESSION["description_language"] = $_POST["descriptionLanguage"];
					echo $results;

					if ($results == "ok") {
						echo '<script>
									swal("Lenguaje actualizado", "", "success")
									.then((value) => {
										window.location = "dashboard-admin";
									});
										 </script>';
				} 
			} else {
				echo '<script>
					swal("Error al actualizar e lenguaje", "", "error")
					.then((value) => {
						window.location = "dashboard-admin";
					});
						 </script>';
			}
		}

    }
}
?>