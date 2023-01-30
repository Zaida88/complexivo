<?php

require_once "config/db.php";

class ExerciseModel
{
    static public function mdlShowExercises($table, $item, $value,$optionEx)
    {

        if ($item != null) {

            $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();

        }else {

			$stmt = Connect::connection()->prepare("SELECT * FROM $table");
			$stmt->execute();

			if (isset($stmt)) {
				return $stmt->fetchAll();
			} else {
				return null;
			}

		}
    }
}
?>