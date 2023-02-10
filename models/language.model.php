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

    static public function mdlUpdateLanguages($table, $item, $value)
    {

        if ($item != null) {

            $stmt = Connect::connection()->prepare("UPDATE $table SET  name = :name, description= :description  WHERE id = :idLanguages");
            $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->execute()) {

                return "ok";
    
            } else {
    
                return "error";
    
            }
        }
    }
}
?>