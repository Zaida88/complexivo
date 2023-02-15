<?php

require_once "../../controllers/user.controller.php";
require_once "../../models/user.model.php";

class userActivate{ 

/*=============================================
	ACTIVAR USUARIO
=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function usersActivate(){

		$table = "users";

		$item1 = "state_user";
		$valor1 = $this->activarUsuario;

		$item2 = "id_user";
		$valor2 = $this->activarId;

		$result = UsersModel::mdlActivateUserState($tabla, $item1, $valor1, $item2, $valor2);

	}
}