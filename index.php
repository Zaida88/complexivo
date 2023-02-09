<?php
//controladores
require_once "controllers/proyect.controller.php";
require_once "controllers/main.controller.php";
require_once "controllers/user.controller.php";
require_once "controllers/dashboard-client.controller.php";
require_once "controllers/dashboard-admin.controller.php";
require_once "controllers/exercise.controller.php";

//modelos
require_once "models/user.model.php";
require_once "models/proyect.model.php";
require_once "models/language.model.php";
require_once "models/exercise.model.php";
require_once "models/win.model.php";
require_once "models/code.model.php";

$main = new MainController();
$main->ctrMain();

?>