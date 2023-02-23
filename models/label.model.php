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
}