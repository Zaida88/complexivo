<?php

class ExerciseController
{
    static public function ctrShowExercises($table,$item, $value)
    {
        $result = ExerciseModel::mdlShowExercises($table, $item, $value);

        return $result;

    }
}
?>