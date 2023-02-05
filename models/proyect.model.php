<?php

require_once "config/db.php";

class ProyectModel
{
    
	static public function mdlShowProyect($table, $item, $value, $option)
	{

		if ($item != null) {

			$stmt = Connect::connection()->prepare("SELECT $option FROM $table WHERE $item = :$item");
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

	static public function mdlUpdateProyect($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET name = :name, description = :description, phone_number = :phone_number, email = :email WHERE id = :id");

		$stmt -> bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt -> bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone_number", $data["phone_number"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $data["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlVerify($table, $item, $value, $option)
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

	static public function mdlChangeLogo($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET  logo = :logo WHERE id = :id");
		$stmt->bindParam(":logo", $data["logo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

}
?>