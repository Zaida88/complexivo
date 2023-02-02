<?php

require_once "config/db.php";

class ExerciseModel
{
    static public function mdlListExercises($table, $itemEx, $item, $value, $valueEx, $optionEx)
    {

        if ($item != null && $value != null) {
            $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $itemEx = :$itemEx AND $item = :$item");
            $stmt->bindParam(":" . $itemEx, $valueEx, PDO::PARAM_INT);
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Connect::connection()->prepare("SELECT * FROM $table");
            $stmt->execute();
            if (isset($stmt)) {
                return $stmt->fetchAll();
            } else {
                return null;
            }

        }
    }

    static public function mdlShowWins($table, $itemEx, $item, $value, $valueEx, $optionEx)
    {
        $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $itemEx = :$itemEx AND $item = :$item");
        $stmt->bindParam(":" . $itemEx, $valueEx, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlShowExercise($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item ");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlShowWin($table, $item1, $item2, $item3, $user, $value1, $value, $optionEx)
    {

        $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $item1 = :$item1 AND $item2 = :$item2 AND $item3 = :$item3");
        $stmt->bindParam(":" . $item1, $user, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $value1, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item3, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    static public function mdlUpdatestatus($table, $data)
    {

        $stmt = Connect::connection()->prepare("UPDATE $table SET  state = :state WHERE id_exercise = :id_exercise AND id_user = :id_user");
        $stmt->bindParam(":id_exercise", $data["id_exercise"], PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);
        $stmt->bindParam(":state", $data["state"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }

}
?>