<?php

require_once "config/db.php";

class UsersModels
{

	static public function mdlShowUsers($table, $item, $value)
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


		$stmt->close();
		$stmt = null;

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

		$stmt->close();
		$stmt = null;

	}
}