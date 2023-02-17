<?php
require_once "../../controllers/user.controller.php";
require_once "../../models/user.model.php";

class AjaxUserActivate{

    /*=============================================
	    ACTIVAR USUARIO
	=============================================*/	

	public $userActivate;
	public $activateId;


	public function activateUser(){

		$table = "user_show";

		$item1 = "state_user";
		$value1 = $this->userActivate;

		$item2 = "id_user";
		$value2 = $this->activateId;

		$result = UsersModel::mdlUserActualize($table, $item1, $value1, $item2, $value2);

	}
    
}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["userActivate"])){

    $userActivate = new AjaxUserActivate();
    $userActivate -> userActivate = $_POST["userActivate"];
    $userActivate -> activateId = $_POST["activateId"];
    $userActivate -> activateUser();

}