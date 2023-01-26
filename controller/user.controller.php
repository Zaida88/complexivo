<?php

class UsersControllers
{
	static public function ctrLogin()
	{

		if (isset($_POST["username"])) {

			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["username"])) {

				$encrypt = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$table = "users";
				$item = "username";
				$value = $_POST["username"];
				$result = UsersModels::mdlShowUsers($table, $item, $value);

				if ($result["username"] == $_POST["username"] && $result["password"] == $encrypt) {

					if ($result["state"] == 1) {

						$_SESSION["login"] = "ok";
						$_SESSION["id"] = $result["id"];
						$_SESSION["id_rol"] = $result["id_rol"];
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
						$lastLogin = UsersModels::mdlUpdateLastLogin($table, $item1, $value1, $item2, $value2);

						if ($lastLogin == "ok") {

							echo '<script>
								window.location = "dashboard";
							</script>';

						}

					} else {
						echo '<br>
							<div class="alert alert-danger">El username aún no está activado</div>';
					}

				} else {
					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}

			}

		}

	}

}