<?php

require_once "db.php";

class LanguagesModel
{
    static public function mdlShowLanguages($table, $item, $value)
    {

        if ($item != null) {

            $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Connect::connection()->prepare("SELECT * FROM $table");
            $stmt->execute();

            return $stmt->fetchAll();

        }
    }

    static public function mdlUpdateLanguages($table, $data)
    {
        $stmt = Connect::connection()->prepare("UPDATE $table SET  name_language = :name_language, description_language = :description_language  WHERE id_language = :id_language");
        $stmt->bindParam(":name_language", $data["name_language"], PDO::PARAM_STR);
        $stmt->bindParam(":description_language", $data["description_language"], PDO::PARAM_STR);
        $stmt->bindParam(":id_language", $data["id_language"], PDO::PARAM_INT);

        if ($stmt->execute()) { 

            return "ok";

        } else {

            return "error";

        }
    }
    
}
?>