<?php

class ProyectController
{
	/*=============================================
	MOSTRAR INFORMACION
	=============================================*/
	static public function ctrShowProyect($item, $valor)
	{

		$table = "proyect";

		$respuesta = ProyectModel::mdlShowProyect($table, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR INFORMACION
	=============================================*/
    static public function ctrUpdateProyect(){

		if (isset($_POST["updateName"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updateName"])) {

				if (!$_FILES['newLogo']['error'] == 0) {
					$table = "proyect";

					$data = array(
						"id" => $_POST["idProyect"],
						"name" => $_POST["updateName"],
						"description" => $_POST["updateDescription"],
						"email" => $_POST["updateEmail"],
						"phone_number" => $_POST["updatePhoneNumber"]
					);

					$respuesta = ProyectModel::mdlUpdateProyect($table, $data);

					if ($respuesta == "ok") {

						echo '<script>
	
					 swal({
						   type: "success",
						   title: "Se actualizo correctamente",
						   showConfirmButton: true,
						   confirmButtonText: "Cerrar"
						   }).then(function(result){
									 if (result.value) {
	
									 window.location = "proyect";
	
									 }
								 })
	
					 </script>';

					}

				} else {
					$newCode = mt_rand(0001, 9999);
					$logo = $_FILES["newLogo"]["name"];
					$path = $_FILES["newLogo"]["tmp_name"];
					$directorio = "assets/img/proyect/logo/" . $newCode . "/";
					mkdir($directorio, 0755);
					$newLogo = $directorio . $logo;
					copy($path, $newLogo);

					$table = "proyect";

					$data = array(
						"id" => $_POST["idProyect"],
						"name" => $_POST["updateName"],
						"description" => $_POST["updateDescription"],
						"email" => $_POST["updateEmail"],
						"phone_number" => $_POST["updatePhoneNumber"],
						"logo" => $newLogo
					);

					$respuesta = ProyectModel::mdlUpdateProyectImg($table, $data);

					if ($respuesta == "ok") {

						echo '<script>
	
					 swal({
						   type: "success",
						   title: "Actualizacion correcta",
						   showConfirmButton: true,
						   confirmButtonText: "Cerrar"
						   }).then(function(result){
									 if (result.value) {
	
									 window.location = "proyect";
	
									 }
								 })
	
					 </script>';

					}

				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "Error",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "proyect";

							}
						})

			  	</script>';

			}

		}

	}
}
?>