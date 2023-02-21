<?php
require_once "../../models/user.model.php";

class AjaxUsers
{

	public $activateUser;
	public $activateId;


	public function activateUsers(){

		$table = "users";

		$item1 = "state_user";
		$value1 = $this->activateUser;

		$item2 = "id_user";
		$value2 = $this->activateId;

		$respuesta = UsersModel::mdlUserActualize($table, $item1, $value1, $item2, $value2);

	}
}

if(isset($_POST["activateUser"])){

	$activateUser = new AjaxUsers();
	$activateUser -> activateUser = $_POST["activateUser"];
	$activateUser -> activateId = $_POST["activateId"];
	$activateUser -> activateUsers();

}