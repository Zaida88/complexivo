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
    static public function ctrUpdateProyect(){

		if(isset($_POST["updateName"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updateName"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updateDescription"]) &&	
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updateEmail"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updatePhoneNumber"])){

		   		/*=============================================
				VALIDAR IMAGEN
				=============================================*/

			   	$ruta = $_POST["logoActual"];

			   	if(isset($_FILES["updateLogo"]["tmp_name"]) && !empty($_FILES["updateLogo"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["updateLogo"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "assets/img/proyect/logo/".$_POST["updateCode"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["logoActual"]) && $_POST["logoActual"] != "assets/img/proyect/logo/img.png"){

						unlink($_POST["logoActual"]);

					}else{

						mkdir($directorio, 0755);	
					
					}
					
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["updateLogo"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "assets/img/proyect/logo/".$_POST["updateCode"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["updateLogo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["updateLogo"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "assets/img/proyect/logo/".$_POST["updateCode"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["updateLogo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$table = "proyect";

				$data = array("name" => $_POST["updateName"],
							   "description" => $_POST["updateDescription"],
							   "email" => $_POST["updateEmail"],
							   "phone_number" => $_POST["updatePhoneNumber"],
							   "code" => $_POST["updateCode"],
							   "logo" => $ruta);

				$respuesta = ProyectModel::mdlUpdateProyect($table, $data);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "proyect";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
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