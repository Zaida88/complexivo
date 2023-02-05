<?php
class DashboardAdminController
{
    static public function ctrShowLanguages($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlShowLanguages($table, $item, $value);
        return $result;

    }

    static public function ctrUpdateLenguajes()
	{
		if (isset($_POST["updateLenguajes"])){
			if (
				isset($_POST["name"])&&
				isset($_POST["description"])
			){
				if (isset($_POST["email"])){
					$table = "proyect";
					$item = "id";
					$value = $_SESSION["id"];
					$option = "email";
					$result1 = ProyectModel::mdlUpdateProyect($table, $item, $value);
					$_SESSION["e"] = 0;

					foreach ($result1 as $index => $value){
						if (in_array($_POST["email"], $value) ==  1){
							$_SESSION["e"]++;
						}
					}

					if ($_SESSION["e"] == 0){ 
						$table = "proyect";
						$item = "id";
						$value = $_SESSION["id"];
						$option = "name";
					    $result1 = ProyectModel::mdlUpdateProyect($table, $item, $value);
						$_SESSION["n"] = 0;

						foreach ($result1 as $proyect => $value){
							if (in_array($_POST["name"], $value) == 1){
								$_SESSION["n"]++;
							}
						}
						if ($_SESSION["n"] == 0 ){
							$table = "proyect";
							$data = array(
								"name" => $_POST["name"],
								"description" => $_POST["description"],
								"phone_number" => $_POST["phoneNumber"],
								"email" => $_POST["email"]
							);

							$results = ProyectModel::mdlUpdateProyect($table, $data);
							$_SESSION["name"] = $_POST["name"];
							$_SESSION["description"] = $_POST["description"];
							$_SESSION["phone_number"] = $_POST["phoneNumber"];
							$_SESSION["n"] = null;
							$_SESSION["e"] = null;

							if ($results == "ok"){
								echo '<script>
									swal("Actualizado con exito", "", "success")
									.then((value) => {
										window.location = "proyect";
									});
										 </script>';
							}
						}else {
							echo '<script>
						swal("El nombre de usuario no se encuentra disponible", "", "error")
						.then((value) => {
							window.location = "proyect";
						});
							 </script>';
						}
					}else {
						echo '<script>
						swal("El correo electrónico ya se encuentra registrado", "", "error")
						.then((value) => {
							window.location = "proyect";
						});
							 </script>';
					}
				}
			} else { 
			echo '<script>
			swal("No se permiten caracteres especiales 002", "", "error")
			.then((value) => {
				window.location = "proyect";
			});
				 </script>';
		}
		}
	}

}
?>