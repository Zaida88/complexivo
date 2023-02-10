<?php
require_once "../../controllers/exercise.controller.php";
require_once "../../models/exercise.model.php";

class DataExercise
{
	public $idExercise;

	public function updateExercise()
	{
		$item = "id_exercise";
		$value = $this->idExercise;
		$result = ExerciseController::ctrShowExercise($item, $value);
		echo json_encode($result);
	}
}

/*=============================================
=============================================*/
if (isset($_POST["idExercise"])) {
	$exercise = new DataExercise();
	$exercise->idExercise = $_POST["idExercise"];
	$exercise->updateExercise();
}