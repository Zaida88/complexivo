<?php

require_once "db.php";

class LabelModel
{
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

    static public function mdlShowLabel($table, $item, $value)
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

}
?>