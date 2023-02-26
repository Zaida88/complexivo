<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

require_once "../../../controllers/code.controller.php";
require_once "../../../models/code.model.php";

class DataExercise
{
	public $idExercise;
	public $idCode;
	public function updateExercise()
	{
		$item = "id_exercise";
		$value = $this->idExercise;
		$result = ExerciseController::ctrShowExercise($item, $value);
		echo json_encode($result);
	}

	public function updateCode()
	{
		$item = "id_code";
		$value = $this->idCode;
		$result = CodeController::ctrShowCode($item, $value);
		echo json_encode($result);
	}
}


if (isset($_POST["idExercise"])) {
	$exercise = new DataExercise();
	$exercise->idExercise = $_POST["idExercise"];
	$exercise->updateExercise();
} elseif (isset($_POST["idCode"])) {
	$code = new DataExercise();
	$code->idCode = $_POST["idCode"];
	$code->updateCode();
}
