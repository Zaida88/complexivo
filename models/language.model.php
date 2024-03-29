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

    static public function mdlListLanguageAdmin($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetch();
        } 
    }

    static public function mdlUpdateLanguage($table, $data)
    {
        $stmt = Connect::connection()->prepare("UPDATE $table SET  name_language = :name_language, description_language = :description_language, start_code_language = :start_code_language, end_code_language = :end_code_language  WHERE id_language = :id_language");
        $stmt->bindParam(":name_language", $data["name_language"], PDO::PARAM_STR);
        $stmt->bindParam(":description_language", $data["description_language"], PDO::PARAM_STR);
        $stmt->bindParam(":start_code_language", $data["start_code_language"], PDO::PARAM_STR);
        $stmt->bindParam(":end_code_language", $data["end_code_language"], PDO::PARAM_STR);
        $stmt->bindParam(":id_language", $data["id_language"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }
    }
    
}
?>