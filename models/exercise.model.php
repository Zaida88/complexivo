<?php

require_once "config/db.php";

class ExerciseModel
{
    static public function mdlShowExercises($table, $item, $value)
    {

        if ($item != null) {

            $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();

        }
    }
}
?>