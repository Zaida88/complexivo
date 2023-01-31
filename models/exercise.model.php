<?php

require_once "config/db.php";

class ExerciseModel
{
    static public function mdlShowExercises($table, $itemEx,$item, $value, $valueEx,$optionEx)
    {

        if ($itemEx != null) {

            $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $itemEx = :$itemEx AND $item = :$item");
            $stmt->bindParam(":" . $itemEx, $valueEx, PDO::PARAM_INT);
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
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