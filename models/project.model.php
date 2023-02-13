<?php

require_once "db.php";

class ProjectModel
{
    
	static public function mdlShowProject($table, $item, $value, $option)
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

	static public function mdlUpdateProject($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET name_project = :name_project, description_project = :description_project, email_project = :email_project, phone_number_project = :phone_number_project WHERE id_project = :id_project");

		$stmt -> bindParam(":name_project", $data["name_project"], PDO::PARAM_STR);
		$stmt -> bindParam(":description_project", $data["description_project"], PDO::PARAM_STR);
		$stmt -> bindParam(":email_project", $data["email_project"], PDO::PARAM_STR);
		$stmt -> bindParam(":phone_number_project", $data["phone_number_project"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_project", $data["id_project"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlChangeLogo($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET  logo_project = :logo_project WHERE id_project = :id_project");
		$stmt->bindParam(":logo_project", $data["logo_project"], PDO::PARAM_STR);
		$stmt->bindParam(":id_project", $data["id_project"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

}
?>