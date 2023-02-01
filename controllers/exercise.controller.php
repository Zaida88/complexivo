<?php

class ExerciseController
{
    static public function ctrListExercises( $itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlListExercises($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }

	static public function ctrShowWins( $itemEx,$item,$value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlShowWins($table, $itemEx,$item, $value,$valueEx, $optionEx);

        return $result;

    }

    // static public function ctrShowExercise()
	// {

	// 	if (isset($_GET["idExercise"])) {

	// 		$table = "win";
	// 		$data = $_GET["idExercise"];
	// 		$user = $_GET["idExercise"];
	// 		$result = ExerciseModel::ShowExercise($table,$data,);

	// 	}

	// }
}
?>