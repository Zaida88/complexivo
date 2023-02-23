<?php

require_once "db.php";

class LabelModel
{
    static public function mdlVerifyLabels($table, $item, $value,$option)
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

    static public function mdlTableLabels($table, $item, $value)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY 	id_label ASC");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();

    }


}
?>