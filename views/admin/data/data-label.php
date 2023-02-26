<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";

class DataLabel
{
	public $idLabel;
	public function updateLabel()
	{
		$item = "id_label";
		$value = $this->idLabel;
		$result = LabelController::ctrShowLabelUpdate($item, $value);
		echo json_encode($result);
	}
}


if (isset($_POST["idLabel"])) {
	$label = new DataLabel();
	$label->idLabel = $_POST["idLabel"];
	$label->updateLabel();
}