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
		$stmt = Connect::connection()->prepare("UPDATE $table SET name_proyect = :name_proyect, description_proyect = :description_proyect, email_proyect = :email_proyect, phone_number_proyect = :phone_number_proyect WHERE id_proyect = :id_proyect");

		$stmt -> bindParam(":name_proyect", $data["name_proyect"], PDO::PARAM_STR);
		$stmt -> bindParam(":description_proyect", $data["description_proyect"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone_number_proyect", $data["phone_number_proyect"], PDO::PARAM_STR);
		$stmt -> bindParam(":email_proyect", $data["email_proyect"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_proyect", $data["id_proyect"], PDO::PARAM_INT);

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
		$stmt = Connect::connection()->prepare("UPDATE $table SET  logo_proyect = :logo_proyect WHERE id_proyect = :id_proyect");
		$stmt->bindParam(":logo_proyect", $data["logo_proyect"], PDO::PARAM_STR);
		$stmt->bindParam(":id_proyect", $data["id_proyect"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

}
?>