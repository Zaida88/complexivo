<?php
//controladores
require_once "controller/proyect.controller.php";
require_once "controller/main.controller.php";
require_once "controller/user.controller.php";

//modelos
require_once "models/user.model.php";
require_once "models/proyect.model.php";

$main = new MainController();
$main->ctrMain();

?>