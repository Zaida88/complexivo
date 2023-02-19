<?php
require_once "../../controllers/user.controller.php";
require_once "../../models/user.model.php";

class DataUser
{
	public $idUser;
 
	public function updateUser()
	{
		$item = "id_user";
		$value = $this->idUser;
		$result = UsersController::ctrShowUsers($item, $value);
		echo json_encode($result);
	}
}

if(isset($_POST["idUser"])){
	$user = new DataUser();
	$user->idUser = $_POST["idUser"];
	$user->updateUser();
}