<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotEnv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotEnv->load();

use PHPMailer\PHPMailer\PHPMailer;

class UsersController
{
	static public function ctrLogin()
	{

		if (isset($_POST["username"]) && isset($_POST["password"])) {

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"])) {

				$encrypt = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$option = "*";
				$table = "users";
				$item = "username";
				$value = $_POST["username"];
				$result = UsersModel::mdlShowUsers($table, $item, $value, $option);

				if ($result) {
					if ($result["username"] == $_POST["username"] && $result["password"] == $encrypt) {

						if ($result["state"] == 1) {

							$_SESSION["login"] = "ok";
							$_SESSION["id"] = $result["id"];
							$_SESSION["rol"] = $result["id_rol"];
							$_SESSION["first_name"] = $result["first_name"];
							$_SESSION["last_name"] = $result["last_name"];
							$_SESSION["username"] = $result["username"];
							$_SESSION["photo"] = $result["photo"];

							date_default_timezone_set('America/Bogota');

							$date = date('Y-m-d');
							$hour = date('H:i:s');
							$actualDate = $date . ' ' . $hour;
							$item1 = "last_login";
							$value1 = $actualDate;
							$item2 = "id";
							$value2 = $result["id"];
							$lastLogin = UsersModel::mdlUpdateLastLogin($table, $item1, $value1, $item2, $value2);

							if ($lastLogin == "ok") {
								if ($_SESSION["rol"] == 1) {
									echo '<script>
									window.location = "dashboard-admin";
									</script>';
								} elseif ($_SESSION["rol"] == 2) {
									echo '<script>
									window.location = "dashboard-client";
									</script>';
								}
							}

						} else {
							echo '
								<div class="alert alert-danger">El usuario se encuentra desactivado</div>';
						}

					} else {
						echo '<div class="alert alert-danger">Contraseña incorrecta</div>';
					}
				} else {
					echo '<div class="alert alert-danger">Nombre de usuario incorrecto</div>';
				}

			}

		}
	}

	static public function ctrResetPass()
	{

		if (isset($_POST["email"])) {

			if (preg_match('/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i', $_POST["email"])) {

				$table = "users";
				$item = "email";
				$value = $_POST["email"];
				$option = "*";
				$result = UsersModel::mdlShowUsers($table, $item, $value, $option);

				if ($result) {
					if ($result["email"] == $_POST["email"]) {

						if ($result["state"] == 1) {
							$newPass = generatePass();
							$encrypted_pass = crypt($newPass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
							$id = $result['id'];

							$data = array(
								"id" => $id,
								"password" => $encrypted_pass
							);

							$reply = UsersModel::mdlResetPass($table, $data);
							if ($reply == "ok") {
								$mail = new PHPMailer;
								$mail->SMTPDebug = 0;
								$mail->isSMTP();
								$mail->Host = 'smtp.gmail.com';
								$mail->SMTPAuth = true;
								$mail->Username = $_SERVER['USERNAME_EMAIL'];
								$mail->Password = $_SERVER['PASSWORD_EMAIL'];
								$mail->SMTPSecure = 'tls';
								$mail->Port = 587;
								$mail->CharSet = 'UTF-8';
								$mail->SMTPOptions = [
									'ssl' => [
										'verify_peer' => false,
										'verify_peer_name' => false,
										'allow_self_signed' => true,
									]
								];
								$mail->setFrom($_SERVER['USERNAME_EMAIL'], 'WORLDCODES');
								$mail->addAddress($value);
								$mail->isHTML(true);
								$mail->Subject = 'Restablecimiento de contraseña';
								$mail->Body = 'Nueva contraseña: ' . $newPass;
								$mail->AltBody = 'Nueva contraseña: ' . $newPass;
								if (!$mail->send()) {
									echo 'Se produjo un problema al enviar el mensaje.';
									echo 'Error: ' . $mail->ErrorInfo;
								} else {
									echo '<script>
	
									swal({
										  type: "success",
										  title: "Nueva contaseña enviada a su correo electronico",
										  showConfirmButton: true
										  }).then(function(result){
													if (!result.value) {
													window.location = "login";
													}
												})
				   
									</script>';
								}
							}
						} else {
							echo '<div class="alert alert-danger">El usuario se encuentra desactivado</div>';
						}

					} else {
						echo '<div class="alert alert-danger">Correo no valido o no registrado/div>';
					}
				} else {
					echo '<div class="alert alert-danger">Correo no valido o no registrado</div>';
				}

			} else {
				echo '<div class="alert alert-danger">Correo no valido o no registrado</div>';
			}

		}

	}

	static public function ctrCreateUser()
	{

		if (isset($_POST["newUsername"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newUsername"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["first_name"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["last_name"])
			) {

				$table = "users";
				$item = "email";
				$value = $_POST["email"];
				$option = "*";
				$result = UsersModel::mdlShowUsers($table, $item, $value, $option);

				if (!$result) {
					$table = "users";
					$item = "username";
					$value = $_POST["newUsername"];
					$option = "*";
					$result = UsersModel::mdlShowUsers($table, $item, $value, $option);

					if (!$result) {
						if (preg_match('/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i', $_POST["email"])) {

							if ($_POST["password1"] == $_POST["password2"]) {

								if (!$_FILES['newPhoto']['error'] == 0) {
									$table = "users";
									$encrypted_pass = crypt($_POST["password1"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
									$newPhoto = "assets/img/users/user-default.png";

									$data = array(
										"username" => $_POST["newUsername"],
										"first_name" => $_POST["first_name"],
										"last_name" => $_POST["last_name"],
										"email" => $_POST["email"],
										"password" => $encrypted_pass,
										"photo" => $newPhoto,
										"id_rol" => 2,
										"state" => 1
									);

									$tableEx = "exercises";
									$itemEx = null;
									$valueEx = null;
									$optionEx = "id";

									$reply = UsersModel::mdlCreateUser($table, $data);

									$tableUsr = "users";
									$itemUsr = "email";
									$valueUsr = $_POST["email"];
									$optionUsr = "id";

									$tableWins = "wins";
									$item1 = "id_exercise";
									$item2 = "id_user";
									$item3 = "state";
									$state = 0;
									$item = null;
									$value = null;

									$resultEx = ExerciseModel::mdlListExercises($tableEx, $itemEx, $item, $value, $valueEx, $optionEx);
									$resultUsr = UsersModel::mdlShowUsers($tableUsr, $itemUsr, $valueUsr, $optionUsr);
									foreach ($resultEx as $key => $values) {
										WinsModel::mdlCreateWins($tableWins, $item1, $item2, $item3, $values["id"], $resultUsr["id"], $state);
									}

									if ($reply == "ok") {
										echo '<script>
									swal({
										type: "success",
										title: "¡Registrado exitosamente!",
										showConfirmButton: true
									}).then(function(result){
										if(!result.value){				
											window.location = "login";
										}
									})
									</script>';
									}

								} else {
									$table = "users";
									$photo = $_FILES["newPhoto"]["name"];
									$path = $_FILES["newPhoto"]["tmp_name"];
									$route = "assets/img/users/" . $_POST["newUsername"] . "/";
									mkdir($route, 0755);
									$newPhoto = $route . $photo;
									copy($path, $newPhoto);

									$encrypted_pass = crypt($_POST["password1"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

									$data = array(
										"username" => $_POST["newUsername"],
										"first_name" => $_POST["first_name"],
										"last_name" => $_POST["last_name"],
										"email" => $_POST["email"],
										"password" => $encrypted_pass,
										"photo" => $newPhoto,
										"id_rol" => 2,
										"state" => 1
									);

									$reply = UsersModel::mdlCreateUser($table, $data);

									if ($reply == "ok") {
										echo '<script>
									swal({
										type: "success",
										title: "¡Registrado exitosamente!",
										showConfirmButton: true
									}).then(function(result){
										if(!result.value){				
											window.location = "login";
										}
									})
									</script>';
									}

								}

							} else {
								echo '<div class="alert alert-danger">Las contraseñas no coinciden</div>';
							}
						} else {
							echo '<div class="alert alert-danger">Correo ingresado no válido</div>';
						}
					} else {
						echo '<div class="alert alert-danger">El nombre de usuario ya se encuentra registrado</div>';
					}
				} else {
					echo '<div class="alert alert-danger">El correo electrónico ya se encuentra registrado</div>';
				}
			} else {
				echo '<div class="alert alert-danger">No se puede permiten caracteres especiales</div>';
			}
		}

	}

	static public function ctrShowUsers($item, $valor)
	{
		$tabla = "users";
		$option = "*";
		$respuesta = UsersModel::mdlShowUsers($tabla, $item, $valor, $option);

		return $respuesta;
	}
}
function generatePass()
{
	$reg = "abcdefghijklmnopqrstuvwxyz0123456789";
	$stringSize = strlen($reg);
	$pass = "";
	$passSize = 6;
	for ($i = 1; $i <= $passSize; $i++) {
		$pos = rand(0, $stringSize - 1);
		$pass .= substr($reg, $pos, 1);
	}
	return $pass;
}