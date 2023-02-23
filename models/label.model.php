<?php

require_once "db.php";

class LabelModel
{
    static public function mdlTableLabels($table, $item, $value)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id_label ASC");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    static public function mdlListLabels($table, $item, $value, $option)
    {
        $stmt = Connect::connection()->prepare("SELECT $option FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlSearchLabel($table, $value, $value2)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE name_label LIKE '%" . $value . "%' AND idLanguage = $value2");
        $stmt->execute();
        return $stmt->fetchAll();

    }

}
?>