<?php

require_once "../controllers/proyect.controller.php";
require_once "../models/proyect.model.php";

class AjaxProyect{

    /*=============================================
	EDITAR PROYECT
	=============================================*/	

	public $idProyect;

	public function ajaxUpdateProyect(){

		$item = "id";
		$valor = $this->idProyect;

		$respuesta = ProyectController::ctrShowProyect($item, $valor);

		echo json_encode($respuesta);

	}
}

    if (isset($_POST["idProyect"])) {
        $proyect = new AjaxProyect();
        $proyect->idProyect = $_POST["idProyect"];
        $proyect->ajaxUpdateProyect();
    }



















?>