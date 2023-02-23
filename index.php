<?php
//controladores
require_once "controllers/project.controller.php";
require_once "controllers/main.controller.php";
require_once "controllers/user.controller.php";
require_once "controllers/dashboard-client.controller.php";
require_once "controllers/dashboard-admin.controller.php";
require_once "controllers/exercise.controller.php";
require_once "controllers/code.controller.php";
require_once "controllers/label.controller.php";

//modelos
require_once "models/user.model.php";
require_once "models/project.model.php";
require_once "models/language.model.php";
require_once "models/exercise.model.php";
require_once "models/win.model.php";
require_once "models/code.model.php";
require_once "models/label.model.php";

$main = new MainController();
$main->ctrMain();

?>