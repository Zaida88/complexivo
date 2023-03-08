<?php

require_once "db.php";

class UserLabel
{

	static public function mdlCreateLabelUser($table, $item1, $item2, $value, $value2)
	{
		$stmt = Connect::connection()->prepare("INSERT INTO $table (idLabel, idUser, state_label) VALUES (:idLabel, :idUser, 0)");
		$stmt->bindParam(":idLabel", $value, PDO::PARAM_INT);
		$stmt->bindParam(":idUser", $value2, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

	static public function mdlDeleteLabelUser($tabla, $data)
	{

		$stmt = Connect::connection()->prepare("DELETE FROM $tabla WHERE idLabel = :idLabel");

		$stmt->bindParam(":idLabel", $data, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}

	}
}
?>