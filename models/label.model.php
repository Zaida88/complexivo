<?php

require_once "db.php";

class LabelModel
{
    static public function mdlShowLabels($table)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlListLabelUser($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }
    static public function mdlShowLabelUser($table, $item, $item1, $value, $value1)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item AND $item1 = :$item1");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item1, $value1, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    static public function mdlCreateLabel($table, $data)
    {
        $stmt = Connect::connection()->prepare("INSERT INTO $table (idLanguage,name_label,description_label,img_label,number_label) VALUES (:idLanguage,:name_label,:description_label,:img_label,:number_label)");
        $stmt->bindParam(":idLanguage", $data["idLanguage"], PDO::PARAM_INT);
        $stmt->bindParam(":name_label", $data["name_label"], PDO::PARAM_STR);
        $stmt->bindParam(":description_label", $data["description_label"], PDO::PARAM_STR);
        $stmt->bindParam(":img_label", $data["img_label"], PDO::PARAM_STR);
        $stmt->bindParam(":number_label", $data["number_label"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }

    static public function mdlShowLabelUpdate($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();

    }

    static public function mdlShowDelete($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchALL();

    }

    static public function mdlUpdateLabel($table, $data)
    {
        $stmt = Connect::connection()->prepare("UPDATE $table SET  name_label = :name_label, description_label = :description_label,number_label=:number_label  WHERE id_label = :id_label");
        $stmt->bindParam(":name_label", $data["name_label"], PDO::PARAM_STR);
        $stmt->bindParam(":description_label", $data["description_label"], PDO::PARAM_STR);
        $stmt->bindParam(":id_label", $data["id_label"], PDO::PARAM_INT);
        $stmt->bindParam(":number_label", $data["number_label"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }
    }

    static public function mdlUpdateLabelImg($table, $data)
    {
        $stmt = Connect::connection()->prepare("UPDATE $table SET  name_label = :name_label, description_label = :description_label, img_label = :img_label,number_label=:number_label  WHERE id_label = :id_label");
        $stmt->bindParam(":name_label", $data["name_label"], PDO::PARAM_STR);
        $stmt->bindParam(":description_label", $data["description_label"], PDO::PARAM_STR);
        $stmt->bindParam(":img_label", $data["img_label"], PDO::PARAM_STR);
        $stmt->bindParam(":id_label", $data["id_label"], PDO::PARAM_INT);
        $stmt->bindParam(":number_label", $data["number_label"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }
    }

    static public function mdlVerifyLabel($table, $item, $value, $option)
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

    static public function mdlDeleteLabel($tabla, $data)
    {

        $stmt = Connect::connection()->prepare("DELETE FROM $tabla WHERE id_label = :id_label");

        $stmt->bindParam(":id_label", $data, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }
    static public function mdlShowLabel($table, $item, $value, $item2, $value2)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item AND $item2 = :$item2");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item2, $value2, PDO::PARAM_INT);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetch();
        } else {
            return null;
        }
    }

    static public function mdlShowLabelAdmin($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetch();
        } else {
            return null;
        }
    }
    static public function mdlTableLabels($table, $item, $value)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id_user_label ASC");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }

    static public function mdlShowTableLabels($table, $item, $value)
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

    static public function mdlLabelsAdminCreate($table, $item, $value, $optionEx)
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

    static public function mdlUpdateStatus($table, $data)
    {

        $stmt = Connect::connection()->prepare("UPDATE $table SET  state_label = :state_label WHERE idLabel = :idLabel AND idUser = :idUser");
        $stmt->bindParam(":idLabel", $data["idLabel"], PDO::PARAM_STR);
        $stmt->bindParam(":idUser", $data["idUser"], PDO::PARAM_INT);
        $stmt->bindParam(":state_label", $data["state_label"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

    }
}
?>