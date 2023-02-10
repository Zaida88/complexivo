<?php

require_once "config/db.php";

class CodeModel
{
    static public function mdlCreateCode($table, $value,$value2,$value3)
    {
        $stmt = Connect::connection()->prepare("INSERT INTO $table (idLanguage,name_exercise,description_exercise) VALUES (:idLanguage,:name_exercise,:description_exercise)");
        $stmt->bindParam(":idLanguage", $value["idLanguage"], PDO::PARAM_INT);
        $stmt->bindParam(":name_exercise", $value2["name_exercise"], PDO::PARAM_STR);
        $stmt->bindParam(":description_exercise", $value3["description_exercise"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }
}
?>