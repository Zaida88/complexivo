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
							$_SESSION["email"] = $result["email"];
							$_SESSION["password"] = $result["password"];

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
							echo '<div class="alert alert-danger">El usuario se encuentra desactivado</div>';
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
							$newPass = generateCode();
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
									swal("Nueva contaseña enviada a su correo electronico", "", "success")
									.then((value) => {
										window.location = "login";
									});
										 </script>';
								}
							}
						} else {
							echo '<div class="alert alert-danger">El usuario se encuentra desactivado</div>';
						}

					} else {
						echo '<div class="alert alert-danger">Correo no válido o no registrado/div>';
					}
				} else {
					echo '<div class="alert alert-danger">Correo no válido o no registrado</div>';
				}

			} else {
				echo '<div class="alert alert-danger">Correo no válido o no registrado</div>';
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
										WinsModel::mdlCreateWins($tableWins, $item1, $item2, $item3, $values["id_exercise"], $resultUsr["id"], $state);
									}

									if ($reply == "ok") {
										echo '<script>
										swal("Registrado exitosamente", "", "success")
										.then((value) => {
											window.location = "login";
										});
											 </script>';
									}

								} else {
									$table = "users";
									$photo = $_FILES["newPhoto"]["name"];
									$path = $_FILES["newPhoto"]["tmp_name"];
									$route = "assets/img/users/" . $_POST["newUsername"] . "/";
									if (!file_exists($route)) {
										mkdir($route, 0755);
									}
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
										WinsModel::mdlCreateWins($tableWins, $item1, $item2, $item3, $values["id_exercise"], $resultUsr["id"], $state);
									}

									if ($reply == "ok") {
										echo '<script>
										swal("Registrado exitosamente", "", "success")
										.then((value) => {
											window.location = "login";
										});
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
						echo '<div class="alert alert-danger">El nombre de usuario no se encuentra disponible</div>';
					}
				} else {
					echo '<div class="alert alert-danger">El correo electrónico ya se encuentra registrado</div>';
				}
			} else {
				echo '<div class="alert alert-danger">No se permiten caracteres especiales</div>';
			}
		}

	}

	static public function ctrShowUsers($item, $value)
	{
		$table = "users";
		$option = "*";
		$results = UsersModel::mdlShowUsers($table, $item, $value, $option);

		return $results;
	}

	static public function ctrListUsers($item, $valor)
	{
		$table = "user_show";
		$option = "*";
		$results = UsersModel::mdlListUsers($table, $item, $valor);

		return $results;
	}

	static public function ctrChangePhoto()
	{
		if (isset($_POST['photo'])) {
			if ($_FILES['newPhoto']['error'] == 0) {
				$newCode = generateCode();
				$img = $newCode . $_FILES["newPhoto"]["name"];
				$path = $_FILES["newPhoto"]["tmp_name"];
				$route = "assets/img/users/" . $_SESSION["username"] . "/";
				if (!file_exists($route)) {
					mkdir($route, 0755);
				}
				$newImg = $route . $img;
				copy($path, $newImg);

				$table = "users";

				$data = array(
					"id" => $_SESSION["id"],
					"photo" => $newImg
				);
				$results = UsersModel::mdlChangePhoto($table, $data);
				$_SESSION["photo"] = $newImg;
				if ($results == "ok") {
					echo '<script>
					swal("Foto de perfil actualizada", "", "success")
					.then((value) => {
						window.location = "profile";
					});
						 </script>';
				}

			} else {
				echo '<script>
				swal("Imagen no seleccionada", "", "error")
				.then((value) => {
					window.location = "profile";
				});
					 </script>';
			}
		}
	}

	static public function ctrUpdateUser()
	{
		if (isset($_POST["updateUser"])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["username"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["firstName"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["lastName"])
			) {
				if (preg_match('/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i', $_POST["email"])) {
					$encrypt = crypt($_POST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					$table = "users";
					$item = "id";
					$value = $_SESSION["id"];
					$option = "email";
					$result1 = UsersModel::mdlVerify($table, $item, $value, $option);
					$_SESSION["e"] = 0;

					foreach ($result1 as $index => $value) {
						if (in_array($_POST["email"], $value) == 1) {
							$_SESSION["e"]++;
						}
					}
					if ($_SESSION["password"] == $encrypt) {
						if ($_SESSION["e"] == 0) {
							$table = "users";
							$item = "id";
							$value = $_SESSION["id"];
							$option = "username";
							$result1 = UsersModel::mdlVerify($table, $item, $value, $option);
							$_SESSION["u"] = 0;

							foreach ($result1 as $index => $value) {
								if (in_array($_POST["username"], $value) == 1) {
									$_SESSION["u"]++;
								}
							}
							if ($_SESSION["u"] == 0) {
								$table = "users";
								$data = array(
									"id" => $_SESSION["id"],
									"username" => $_POST["username"],
									"first_name" => $_POST["firstName"],
									"last_name" => $_POST["lastName"],
									"email" => $_POST["email"]
								);

								$results = UsersModel::mdlUpdateUser($table, $data);
								$_SESSION["first_name"] = $_POST["firstName"];
								$_SESSION["last_name"] = $_POST["lastName"];
								$_SESSION["username"] = $_POST["username"];
								$_SESSION["email"] = $_POST["email"];
								$_SESSION["u"] = null;
								$_SESSION["e"] = null;

								if ($results == "ok") {
									echo '<script>
									swal("Actualizado con exito", "", "success")
									.then((value) => {
										window.location = "profile";
									});
										 </script>';
								}
							} else {
								echo '<script>
							swal("El nombre de usuario no se encuentra disponible", "", "error")
							.then((value) => {
								window.location = "profile";
							});
								 </script>';
							}
						} else {
							echo '<script>
							swal("El correo electrónico ya se encuentra registrado", "", "error")
							.then((value) => {
								window.location = "profile";
							});
								 </script>';
						}
					} else {
						echo '<script>
						swal("Contraseña incorrecta", "", "error")
						.then((value) => {
							window.location = "profile";
						});
							 </script>';
					}
				} else {
					echo '<script>
					swal("Correo no válido", "", "error")
					.then((value) => {
						window.location = "profile";
					});
						 </script>';
				}
			} else {
				echo '<script>
				swal("No se permiten caracteres especiales", "", "error")
				.then((value) => {
					window.location = "profile";
				});
					 </script>';
			}
		}

	}

	static public function ctrUpdatePass()
	{
		if (isset($_POST["updatePass"])) {
			if ($_POST["newPass1"] == $_POST["newPass2"]) {
				$encrypt = crypt($_POST["newPass1"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$actualPass = crypt($_POST["actualPass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				if ($_SESSION["password"] == $actualPass) {

					$table = "users";
					$data = array(
						"id" => $_SESSION["id"],
						"password" => $encrypt
					);

					$results = UsersModel::mdlResetPass($table, $data);

					if ($results == "ok") {
						$_SESSION["password"] = $encrypt;
						echo '<script>
									swal("Actualizado con exito", "", "success")
									.then((value) => {
										window.location = "profile";
									});
										 </script>';
					}
				} else {
					echo '<script>
						swal("Contraseña actual incorrecta", "", "error")
						.then((value) => {
							window.location = "profile";
						});
							 </script>';
				}
			} else {
				echo '<script>
					swal("Las contraseñas no coinciden", "", "error")
					.then((value) => {
						window.location = "profile";
					});
						 </script>';
			}
		}

	}

}
function generateCode()
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