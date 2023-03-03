<?php

class ProjectController
{
	/*=============================================
	MOSTRAR INFORMACION
	=============================================*/
	static public function ctrShowProject($item, $value)
    {
        $table = "project";
		$option = "*";

        $results = ProjectModel::mdlShowProject($table, $item, $value, $option);

        return $results;

    }

	/*=============================================
	EDITAR INFORMACION 
	=============================================*/
	static public function ctrUpdateProject()
	{
		if (isset($_POST["updateProject"])){
			if (
				isset($_POST["nameProject"])&&
				isset($_POST["description"])&&
				isset($_POST["email"])&&
				isset($_POST["phoneNumber"])
			){
				$table = "project";
				$item = "id_project";
                $value = $_POST["idProject"];

				if(empty($result)){
					$table = "project";
					$data = array(
						"id_project" => $_SESSION["id_user"],
						"name_project" => $_POST["nameProject"],
						"description_project" => $_POST["description"],
						"email_project" => $_POST["email"],
						"phone_number_project" => $_POST["phoneNumber"],
					);
					$result = ProjectModel::mdlUpdateProject($table, $data);
					
					if ($result == "ok") {
						echo '<script>
						swal("Proyecto actualizado", "", "success")
						.then((value) => {
							window.location = "project";
						});
						</script>';
					}
				}else {
					echo '<script>
					swal("No se actualizo", "", "error")
					.then((value) => {
						window.location = "project";
					});
					</script>';
				} 
			}
		}
		
	}

	/*=============================================
	EDITAR LOGO
	=============================================*/

	static public function ctrChangeLogo()
	{
		if (isset($_POST['logo'])) {
			if ($_FILES['newLogo']['error'] == 0) {
				$newCode = generateCode();
				$img = $newCode . $_FILES["newLogo"]["name"];
				$path = $_FILES["newLogo"]["tmp_name"];
				$route = "assets/img/project/" . "/";
				if (!file_exists($route)) {
					mkdir($route, 0777);
				}
				$newImg = $route . $img;
				copy($path, $newImg);

				$table = 'project';

				$data = array(
					"id_project" => $_SESSION["id_user"],
					"logo_project" => $newImg
				);
				$results = ProjectModel::mdlChangeLogo($table, $data);
				$project["logo_project"] = $newImg;
				if ($results == "ok") {
					echo '<script>
					swal("Logo actualizado", "", "success")
					.then((value) => {
						window.location = "project";
					});
						 </script>';
				}

			} else {
				echo '<script>
				swal("Imagen no seleccionada", "", "error")
				.then((value) => {
					window.location = "project";
				});
					 </script>';
			}
		}
	}
}   	