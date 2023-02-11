<?php

require_once "db.php";

class CodeModel
{
    static public function mdlCreateCode($table, $value1,$value2,$value3)
    {
        $stmt = Connect::connection()->prepare("INSERT INTO $table (idExercise,name_code,number_code) VALUES (:idExercise,:name_code,:number_code)");
        $stmt->bindParam(":idExercise", $value1, PDO::PARAM_INT);
        $stmt->bindParam(":name_code", $value2, PDO::PARAM_STR);
        $stmt->bindParam(":number_code", $value3, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }

    static public function mdlListCodes($table, $item, $value)
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
}
?>