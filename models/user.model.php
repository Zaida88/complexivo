<?php

require_once "db.php";

class UsersModel
{

	static public function mdlShowUsers($table, $item, $value, $option)
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

	static public function mdlTableUsers($table, $item, $value)
    {

        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY id_user ASC");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();

    }

	static public function mdlShowRoles($table, $item, $value, $option)
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

	static public function mdlListUsers($table, $item, $value)
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
		$stmt = Connect::connection()->prepare("UPDATE $table SET  password_user = :password_user WHERE id_user = :id_user");
		$stmt->bindParam(":password_user", $data["password_user"], PDO::PARAM_STR);
		$stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

	static public function mdlCreateUser($table, $data)
	{

		$stmt = Connect::connection()->prepare("INSERT INTO $table (username_user, first_name_user, last_name_user, email_user, password_user,photo_user,idRol,state_user) VALUES (:username_user, :first_name_user, :last_name_user, :email_user, :password_user,:photo_user,:idRol,:state_user)");
		$stmt->bindParam(":username_user", $data["username_user"], PDO::PARAM_STR);
		$stmt->bindParam(":first_name_user", $data["first_name_user"], PDO::PARAM_STR);
		$stmt->bindParam(":last_name_user", $data["last_name_user"], PDO::PARAM_STR);
		$stmt->bindParam(":email_user", $data["email_user"], PDO::PARAM_STR);
		$stmt->bindParam(":password_user", $data["password_user"], PDO::PARAM_STR);
		$stmt->bindParam(":photo_user", $data["photo_user"], PDO::PARAM_STR);
		$stmt->bindParam(":idRol", $data["idRol"], PDO::PARAM_INT);
		$stmt->bindParam(":state_user", $data["state_user"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}

	}

	static public function mdlChangePhoto($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET  photo_user = :photo_user WHERE id_user = :id_user");
		$stmt->bindParam(":photo_user", $data["photo_user"], PDO::PARAM_STR);
		$stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

	static public function mdlUpdateUser($table, $data)
	{
		$stmt = Connect::connection()->prepare("UPDATE $table SET  username_user = :username_user, first_name_user = :first_name_user, last_name_user = :last_name_user, email_user = :email_user  WHERE id_user = :id_user");
		$stmt->bindParam(":username_user", $data["username_user"], PDO::PARAM_STR);
		$stmt->bindParam(":first_name_user", $data["first_name_user"], PDO::PARAM_STR);
		$stmt->bindParam(":last_name_user", $data["last_name_user"], PDO::PARAM_STR);
		$stmt->bindParam(":email_user", $data["email_user"], PDO::PARAM_STR);
		$stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";

		} else {

			return "error";

		}
	}

	static public function mdlUpdateUsers($table, $data)
    {
        $stmt = Connect::connection()->prepare("UPDATE $table SET  idRol = :idRol  WHERE id_user = :id_user");
        $stmt->bindParam(":idRol", $data["idRol"], PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
 
        } else {

            return "error";

        }
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

	static public function mdlUserActualize($table, $item1, $value1, $item2, $value2){

		$stmt = Connect::connection()->prepare("UPDATE $table SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $value2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	static public function mdlListUserAdmin($table, $item, $value)
    {
        $stmt = Connect::connection()->prepare("SELECT * FROM $table WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $value, PDO::PARAM_STR);
        $stmt->execute();

        if (isset($stmt)) {
            return $stmt->fetch();
        } 
    }
}
?>
