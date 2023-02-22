<?php
class DashboardAdminController 
{
    static public function ctrShowLanguages($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlShowLanguages($table, $item, $value);
        return $result;

    }

    static public function ctrShowLanguage($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlListLanguageAdmin($table, $item, $value);

        return $result;

    }

    static public function ctrUpdateLanguage()
    {
        if (isset($_POST["updateLanguage"])) {
            if (
                isset($_POST["nameLanguage"]) &&
                isset($_POST["descriptionLanguage"])&&
                isset($_POST["startCodeLanguage"])&&
                isset($_POST["endCodeLanguage"])
            ) {
                $table1 = "languages";
                $item1 = "name_language";
                $value1 = $_POST["nameLanguage"];
                $result1 = LanguagesModel::mdlListLanguageAdmin($table1, $item1, $value1);

                if (empty($result1)) {

                    $table = "languages";
                    $data = array(
                        "id_language" => $_POST["idLanguage"],
                        "name_language" => $_POST["nameLanguage"],
                        "description_language" => $_POST["descriptionLanguage"],
                        "start_code_language" => $_POST["startCodeLanguage"],
                        "end_code_language" => $_POST["endCodeLanguage"]
                    );
                    $results = LanguagesModel::mdlUpdateLanguage($table, $data);

                    if ($results == "ok") {
                        echo '<script>
                                        swal("Lenguaje actualizado con correctamente", "", "success")
                                        .then((value) => {
                                            window.location = "dashboard-admin";
                                        });
                                             </script>';
                    }

                } else {
                    echo '<script>
                    swal("El nombre del Lenguaje ya se encuentra registrado", "", "error")
                    .then((value) => {
                        window.location = "dashboard-admin";
                    });
                         </script>';
                }

            } else {
                echo '<script>
				swal("Los campos no pueden estar vacios", "", "error")
				.then((value) => {
                    window.location = "dashboard-admin";

				});
					 </script>';
            }
        }

    } 

}
?>