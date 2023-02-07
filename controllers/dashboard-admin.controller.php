<?php
class DashboardAdminController
{
    static public function ctrShowLanguages($item, $value)
    {
        $table = "languages";
        $result = LanguagesModel::mdlShowLanguages($table, $item, $value);
        return $result;

    }

    static public function ctrUpdateLenguajes()
	{
		if (isset($_POST["updateLenguajes"])) {
			
			if (
				isset($_POST["name"]) 				
			) 
			{
				if (isset($_POST["description"])) 
				{
					$table = "languages";
					$id = $_GET['id'];
					$item = "id";
					$value = $_SESSION["id"];
					$result1 = LanguagesModel::mdlUpdateLanguages($table, $item, $value, $option);
					$_SESSION["e"] = 0;
				} 
			}
		}

	}

}
?>