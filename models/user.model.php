<?php

require_once "config/db.php";

class UsersModel
{

	static public function mdlShowUsers($table, $item, $value)
	{

		if ($item != null) {

			$stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
			$stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
			$stmt->execute();

			if (isset($stmt)) {
				return $stmt->fetch();
			} else {
				return null;
			}


		} else {

			$stmt = Connect::connection()->prepare("SELECT * FROM $table");
			$stmt->execute();

			if (isset($stmt)) {
				return $stmt->fetchAll();
			} else {
				return null;
			}

		}
	}

	static public function mdlUpdateLastLogin($table, $item1, $value1, $item2, $value2)
	{

		$stmt = Connect::connection()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt->bindParam(":" . $item1, $value1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $value2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

	static public function mdlResetPass($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET  password = :password WHERE id = :id");
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}
}
?>