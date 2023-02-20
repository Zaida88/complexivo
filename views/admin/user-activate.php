<?php
require_once "../../models/user.model.php";

class AjaxUsers
{

	public $activarUsers;
	public $activarId;


	public function ajaxActivarUsers(){

		$table = "users";

		$item1 = "state_user";
		$value1 = $this->activarUsers;

		$item2 = "id_user";
		$value2 = $this->activarId;

		$respuesta = UsersModel::mdlUserActualize($table, $item1, $value1, $item2, $value2);

	}
}

if(isset($_POST["activarUsers"])){

	$activarUsers = new AjaxUsers();
	$activarUsers -> activarUsers = $_POST["activarUsers"];
	$activarUsers -> activarId = $_POST["activarId"];
	$activarUsers -> ajaxActivarUsers();

}