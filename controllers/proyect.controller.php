<?php

class ProyectController {

    public function index(){

        $proyect = new ProyectModel();
        $proyect->getProyect();

        require_once "Views/proyect.php";
    }
}




?>