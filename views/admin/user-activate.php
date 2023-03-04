<?php
require_once "../../models/user.model.php";

class AjaxUsuarios{
	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$table = "users";

		$item1 = "state_user";
		$value1 = $this->activarUsuario;

		$item2 = "id_user";
		$value2 = $this->activarId;


		$respuesta = UsersModel::mdlUserActualize($table, $item1, $value1, $item2, $value2);

	}
}


if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}