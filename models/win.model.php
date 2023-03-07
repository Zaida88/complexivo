<?php

require_once "db.php";

class WinsModel
{

	static public function mdlCreateWins($tableWins, $item1, $item2, $value, $user)
	{
		$stmt = Connect::connection()->prepare("INSERT INTO $tableWins (idExercise, idUser, state_win) VALUES (:idExercise, :idUser, null)");
		$stmt->bindParam(":idExercise", $value, PDO::PARAM_INT);
		$stmt->bindParam(":idUser", $user, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

	static public function mdlDeleteCode($tabla, $data)
	{

		$stmt = Connect::connection()->prepare("DELETE FROM $tabla WHERE idExercise = :idExercise");

		$stmt->bindParam(":idExercise", $data, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}

	}
}
?>