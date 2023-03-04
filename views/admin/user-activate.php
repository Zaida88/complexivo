<?php
require_once "../../models/user.model.php";

class AjaxUsers{
	public $userActivate;
	public $activateId;


	public function ajaxUserActivate(){

		$table = "users";

		$item1 = "state_user";
		$value1 = $this->userActivate;

		$item2 = "id_user";
		$value2 = $this->activateId;


		$respuesta = UsersModel::mdlUserActualize($table, $item1, $value1, $item2, $value2);

	}
}


if(isset($_POST["userActivate"])){

	$userActivate = new AjaxUsers();
	$userActivate -> userActivate = $_POST["userActivate"];
	$userActivate -> activateId = $_POST["activateId"];
	$userActivate -> ajaxUserActivate();

}