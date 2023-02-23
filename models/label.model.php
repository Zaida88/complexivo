<?php

class LabelsModel
{
    static public function mdlShowLabels($table, $item, $value)
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

    static public function mdlListLabelsAdminCreate($table, $item, $value, $optionLa)
    {
        $stmt = Connect::connection()->prepare("SELECT $optionLa FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetchAll();
        } else {
            return null;
        }
    }

    static public function mdlCreateLabel($table, $data)
    {
        $stmt = Connect::connection()->prepare("INSERT INTO $table (idLanguage,name_label,description_label,img_label) VALUES (:idLanguage,:name_label,:description_label,:img_label)");
        $stmt->bindParam(":idLanguage", $data["idLanguage"], PDO::PARAM_INT);
        $stmt->bindParam(":name_label", $data["name_label"], PDO::PARAM_STR);
        $stmt->bindParam(":description_label", $data["description_label"], PDO::PARAM_STR);
        $stmt->bindParam(":img_label", $data["img_label"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }

    static public function mdlListLabelsAdmin($table, $item, $value)
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