<?php

class ExerciseController
{
    static public function ctrShowExercises($table, $itemEx, $item, $value, $valueEx, $optionEx)
    {
        $result = ExerciseModel::mdlShowExercises($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }
}
?>