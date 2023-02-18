<?php
require_once "../../controllers/dashboard-admin.controller.php";
require_once "../../models/language.model.php";

class DataDashboard
{
	public $idLanguage;

	public function updateLanguage()
	{
		$item = "id_language";
		$value = $this->idLanguage;
		$result = DashboardAdminController::ctrUpdateLanguages();
		echo json_encode($result);
	}
}

if(isset($_POST["idLanguage"])){
	$language = new DataDashboard();
	$language->idLanguage = $_POST["idLanguage"];
	$language->updateLanguage();
}