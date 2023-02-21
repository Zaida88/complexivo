<?php

require_once "db.php";

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

    static public function mdlVerifyExercises($table, $item, $value, $option)
    {
        $stmt = Connect::connection()->prepare("SELECT $option FROM $table WHERE $item != :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }

    static public function mdlListExercisesAdmin($table, $item, $value)
    {

        if ($item != null && $value != null) {
            $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();

            if (isset($stmt)) {
                return $stmt->fetchAll();
            } else {
                return null;
            }

        }
    }

    static public function mdlTableExercises($table, $item, $value)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id_exercise ASC");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();

    }

    static public function mdlShowExerciseAdmin($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch();

    }

    static public function mdlListExercisesAdminCreate($table, $item, $value, $optionEx)
    {
        $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }
    static public function mdlListWins($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }


    static public function mdlListExercisesFilter($table, $itemEx, $item, $value, $valueEx, $item1, $value1, $optionEx)
    {
        $stmt = Connect::connection()->prepare("SELECT $optionEx FROM $table WHERE $itemEx = :$itemEx AND $item = :$item AND $item1 = :$item1");
        $stmt->bindParam(":" . $itemEx, $valueEx, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item1, $value1, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlShowWins($table, $itemEx, $item, $value, $valueEx, $optionEx)
    {

        $stmt = Connect::connection()->prepare("SELECT $optionEx  FROM $table WHERE $itemEx = :$itemEx AND $item = :$item ORDER BY id_win ASC");

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

    static public function mdlShowExercises($table, $item, $item1, $value, $value1)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item AND $item1 = :$item1");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item1, $value1, PDO::PARAM_INT);
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

    static public function mdlUpdateStatus($table, $data)
    {

        $stmt = Connect::connection()->prepare("UPDATE $table SET  state_win = :state_win ,date_win = :date_win WHERE idExercise = :idExercise AND idUser = :idUser");
        $stmt->bindParam(":idExercise", $data["idExercise"], PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $data["idUser"], PDO::PARAM_INT);
        $stmt->bindParam(":state_win", $data["state_win"], PDO::PARAM_INT);
        $stmt->bindParam(":date_win", $data["date_win"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }

    static public function mdlCreateExercise($table, $data)
    {
        $stmt = Connect::connection()->prepare("INSERT INTO $table (idLanguage,name_exercise,description_exercise) VALUES (:idLanguage,:name_exercise,:description_exercise)");
        $stmt->bindParam(":idLanguage", $data["idLanguage"], PDO::PARAM_INT);
        $stmt->bindParam(":name_exercise", $data["name_exercise"], PDO::PARAM_STR);
        $stmt->bindParam(":description_exercise", $data["description_exercise"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }

    static public function mdlUpdateExercise($table, $data)
    {
        $stmt = Connect::connection()->prepare("UPDATE $table SET  name_exercise = :name_exercise, description_exercise = :description_exercise  WHERE id_exercise = :id_exercise");
        $stmt->bindParam(":name_exercise", $data["name_exercise"], PDO::PARAM_STR);
        $stmt->bindParam(":description_exercise", $data["description_exercise"], PDO::PARAM_STR);
        $stmt->bindParam(":id_exercise", $data["id_exercise"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }
    }

    static public function mdlDeleteExercise($tabla, $data)
    {

        $stmt = Connect::connection()->prepare("DELETE FROM $tabla WHERE id_exercise = :id_exercise");
        $stmt->bindParam(":id_exercise", $data, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }
    }

    static public function mdlSearchExercise($table, $value, $value2, $value3)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE name_exercise LIKE '%" . $value . "%' AND idUser = $value2 AND id_language = $value3");
        $stmt->execute();
        return $stmt->fetchAll();

    }

    static public function mdlSearchExerciseFilter($table, $item,$item2,$item3,$value, $value2, $value3, $value4)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE name_exercise LIKE '%" . $value . "%' AND idUser = $value2 AND id_language = $value3  AND state_win = $value4");
        $stmt->execute();
        return $stmt->fetchAll();

    }

}
?>