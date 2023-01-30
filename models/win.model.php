<?php

require_once "config/db.php";

class WinsModel
{

	static public function mdlCreateWins($tableWins, $item1, $item2, $item3, $value, $user, $state)
	{
		$stmt = Connect::connection()->prepare("INSERT INTO $tableWins (id_exercise, id_user, state) VALUES (:id_exercise, :id_user, :state)");
		$stmt->bindParam(":id_exercise", $value, PDO::PARAM_INT);
		$stmt->bindParam(":id_user", $user, PDO::PARAM_INT);
		$stmt->bindParam(":state", $state, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}
}
?>