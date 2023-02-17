<?php
require_once "../../controllers/dashboard-admin.controller.php";
require_once "../../models/language.model.php";

class DataDashboard
{
	public $idLenguage;

	public function updateLenguage()
	{
		$item = "id_language";
		$value = $this->idLenguage;
		$result = DashboardAdminController::ctrShowLanguages($item, $value);
		echo json_encode($result);
	}
}

if(isset($_POST["idLenguage"])){
	$language = new DataDashboard();
	$language->idLenguage = $_POST["idLenguage"];
	$language->updateLenguage();
}