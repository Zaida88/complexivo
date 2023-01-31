<?php

class ExerciseController
{
    static public function ctrShowExercises( $itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlShowExercises($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }
}
?>