<?php

class ProyectController
{
	/*=============================================
	MOSTRAR INFORMACION
	=============================================*/
	static public function ctrShowProyect($item, $value)
    {
        $table = "proyect";
		$option = "*";

        $results = ProyectModel::mdlShowProyect($table, $item, $value, $option);

        return $results;

    }

	/*=============================================
	EDITAR INFORMACION 
	=============================================*/
	static public function ctrUpdateProyect()
	{
		if (isset($_POST["updateProyect"])){
			if (
				isset($_POST["nameProyect"])&&
				isset($_POST["descriptionProyect"])&&
				isset($_POST["phoneNumberProyect"])&&
				isset($_POST["emailProyect"])
			){
				$table = "proyect";

				$data = array(
					"id_proyect" => $_POST["idProyect"],
					"name_proyect" => $_POST["nameProyect"],
					"description_proyect" => $_POST["descriptionProyect"],
					"email_proyect" => $_POST["emailProyect"],
					"phone_number_proyect" => $_POST["phoneNumberProyect"],
				);
				$results = ProyectModel::mdlUpdateProyect($table, $data);

				if ($results == "ok") {
					echo '<script>
					swal("proyecto actualizado", "", "success")
					.then((value) => {
						window.location = "proyect";
					});
						 </script>';
				}else {
					echo '<script>
					swal("No se actualizo", "", "error")
					.then((value) => {
						window.location = "proyect";
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
		if (isset($_POST['logo_proyect'])) {
			if ($_FILES['newLogo_proyect']['error'] == 0) {
				$newCode = generateCode();
				$img = $newCode . $_FILES["newLogo_proyect"]["name_proyect"];
				$path = $_FILES["newLogo_proyect"]["tmp_name"];
				$route = "assets/img/proyect/logo/" . $_SESSION["name_proyect"] . "/";
				if (!file_exists($route)) {
					mkdir($route, 0755);
				}
				$newImg = $route . $img;
				copy($path, $newImg);

				$table = "proyect";

				$data = array(
					"id_proyect" => $_SESSION["id_proyect"],
					"logo_proyect" => $newImg
				);
				$results = ProyectModel::mdlChangeLogo($table, $data);
				$_SESSION["logo_proyect"] = $newImg;
				if ($results == "ok") {
					echo '<script>
					swal("Logo del proyecto actualizado", "", "success")
					.then((value) => {
						window.location = "proyect";
					});
						 </script>';
				}

			} else {
				echo '<script>
				swal("Imagen no seleccionada", "", "error")
				.then((value) => {
					window.location = "proyect";
				});
					 </script>';
			}
		}
	}
}   	
