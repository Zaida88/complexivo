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
		if (isset($_POST["updateLenguage"])){
			if (
				isset($_POST["nameLanguage"])&&
				isset($_POST["descriptionLanguage"])
			){
				$table = "languages";
				$item = "id_language";
                $value = $_POST["id_language"];

				if(empty($result)){
					$table = "languages";
					$data = array(
						"id_language" => $_POST["id_language"],
						"name_language" => $_POST["nameLanguage"],
						"description_language" => $_POST["descriptionLanguage"],
					);
					$result = LanguagesModel::mdlUpdateLanguages($table, $data);
					
					if ($result == "ok") {
						echo '<script>
						swal("Lenguaje actualizado extosamente", "", "success")
						.then((value) => {
							window.location = "dashboard-admin";
						});
						</script>';
					}
				}else {
					echo '<script>
					swal("No se pudo actualizar el lenguaje", "", "error")
					.then((value) => {
						window.location = "dashboard-admin";
					});
					</script>';
				} 
			}
		}
		
	}
}
?>