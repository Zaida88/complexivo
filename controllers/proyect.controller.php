<?php

class ProyectController
{
	/*=============================================
	MOSTRAR INFORMACION
	=============================================*/
	static public function ctrShowProyect($item, $valor)
	{

		$tabla = "proyect";

		$respuesta = ProyectModel::mdlShowProyect($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR INFORMACION
	=============================================*/
    static public function ctrUpdateProyect(){

		if(isset($_POST["updateProyect"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["updateName"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["logoActual"];

				if(isset($_FILES["updateLogo"]["tmp_name"]) && !empty($_FILES["updateLogo"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["updateLogo"]["tmp_name"]);

					$nuevoAncho = 400;
					$nuevoAlto = 400;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "assets/img/proyect/".$_POST["updateProyect"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["logoActual"])){

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

						$ruta = "assets/img/proyect/".$_POST["updateProyect"]."/".$aleatorio.".jpg";

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

						$ruta = "assets/img/proyect/".$_POST["updateProyect"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["updateLogo"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "proyect";

				$datos = array("name" => $_POST["updateName"],
							   "description" => $_POST["updateDescription"],
							   "logo" => $ruta,
							   "email" => $_POST["updateEmail"],
							   "phone_number" => $_POST["updatePhone_number"]);

				$respuesta = ProyectModel::mdlUpdateProyect($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El proyecto ha sido actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Aceptar"
						  }).then(function(result) {
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
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
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