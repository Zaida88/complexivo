<?php

class ExerciseController
{
    static public function ctrShowExercises($table,$item, $value,$optionEx)
    {
        $result = ExerciseModel::mdlShowExercises($table, $item, $value,$optionEx);

        return $result;

    }
}
?>