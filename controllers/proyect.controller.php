<?php

class ProyectController
{
	/*=============================================
	MOSTRAR INFORMACION
	=============================================*/
	static public function ctrShowProyect($item, $value)
    {
        $table = "proyect";
        $result = ProyectModel::mdlShowProyect($table, $item, $value);

        return $result;

    }

	/*=============================================
	EDITAR INFORMACION 
	=============================================*/
	static public function ctrUpdateProyect()
	{
		if (isset($_POST['logo'])) {
			if ($_FILES['newLogo']['error'] == 0) {
				$newCode = generateCode();
				$img = $newCode . $_FILES["newLogo"]["name"];
				$path = $_FILES["newLogo"]["tmp_name"];
				$route = "assets/img/proyect/logo/" . $_SESSION["username"] . "/";
				if (!file_exists($route)) {
					mkdir($route, 0755);
				}
				$newImg = $route . $img;
				copy($path, $newImg);

				$table = "proyect";

				$data = array(
					"id" => $_SESSION["id"],
					"logo" => $newImg
				);
				$results = ProyectModel::mdlUpdateProyect($table, $data);
				$_SESSION["logo"] = $newImg;
				if ($results == "ok") {
					echo '<script>
					swal("Foto de perfil actualizada", "", "success")
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

?>