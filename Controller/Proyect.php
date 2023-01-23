<?php

class ProyectController {

    public function index(){

        require_once "Models/ProyectModel.php";

        $proyect = new ProyectModel();
        $data["titulo"] = "Proyect";
        $data["proyect"] = $proyect->getProyect();

        require_once "Views/proyect.php";
    }
}




?>