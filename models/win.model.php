<?php

require_once "config/db.php";

class WinsModel
{

	static public function mdlCreateWins($tableWins, $item1, $item2, $item3, $value, $user, $state)
	{
		$stmt = Connect::connection()->prepare("INSERT INTO $tableWins (idExercise, idUser, state_win) VALUES (:idExercise, :idUser, :state_win)");
		$stmt->bindParam(":idExercise", $value, PDO::PARAM_INT);
		$stmt->bindParam(":idUser", $user, PDO::PARAM_INT);
		$stmt->bindParam(":state_win", $state, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}
}
?>