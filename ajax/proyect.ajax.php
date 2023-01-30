<?php

require_once "../controllers/proyect.controller.php";
require_once "../models/proyect.model.php";

class AjaxProyect
{
	public $idProyect;

	public function ajaxUpdateProyect()
	{
		$item = "id";
		$valor = $this->idProyect;
		$result = ProyectController::ctrShowProyect($item, $valor);
		echo json_encode($result);
	}
}

/*=============================================
EDITAR INFORMACION
=============================================*/
if (isset($_POST["idProyect"])) {
	$update = new AjaxProyect();
	$update->idProyect = $_POST["idProyect"];
	$update->ajaxUpdateProyect();
}