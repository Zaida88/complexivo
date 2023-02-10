<?php

require_once "config/db.php";

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
}
?>