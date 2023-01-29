<?php

require_once "config/db.php";

class ProyectModel
{
    static public function mdlShowProyect($table, $item, $value)
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
    }

    static public function mdlUpdateProyect($table, $data)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET  name = :name, description = :description, email = :email, phone_number= :phone_number WHERE id = :id");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":phone_number", $data["phone_number"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}

	static public function mdlUpdateProyectImg($table, $data)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $table SET  name = :name, description = :description, email = :email, phone_number= :phone_number, logo= :logo WHERE id = :id");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":description", $data["description"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":phone_number", $data["phone_number"], PDO::PARAM_STR);
		$stmt->bindParam(":logo", $data["logo"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}

		$stmt->close();
		$stmt = null;

	}
}
?>