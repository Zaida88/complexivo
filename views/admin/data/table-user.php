<?php
require_once "../../../controllers/user.controller.php";
require_once "../../../models/user.model.php";

class TableUsers
{

    public function showTableUsers()
    {

        $item = "idUser";
        $value = $_GET["idUsers"];
        $users = UsersController::ctrTableUsers($item, $value);

        if (count($users) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($users); $i++) {

            if ($_GET["rol"] == 1) {
                if($value["state_user"] != 0){
                    $options = "<button class='btn btn-success btn-sm btnActivate' idUser='".$value["id_user"]."' stateUser='0'><b>Activado</b></button>";
                }else{
                    $options = "<button class='btn btn-success btn-sm btnActivate' idUser='".$value["id_user"]."' stateUser='1'><b>Desactivo</b></button>";
                }
                $options = "<div class='btn-group'><button class='btn btn-primary btn-sm updateUser' idUser='" . $value[$i]["id_user"] . "' data-bs-toggle='modal' data-bs-target='#updateUserModal'><i class='fa-solid fa-user-pen'></i></button></div>>";
                $dataJson .= '[
                    "' . ($i + 1) . '",
                    "' . $value[$i]["username_user"] . '",
                    "' . $value[$i]["email_user"] . '",
                    "' . $value[$i]["name_rol"] . '",
                    "' . $options . '"
                  ],';
            } else {
                $dataJson .= '[
                    "' . ($i + 1) . '",
                    "' . $value[$i]["username_user"] . '",
                    "' . $value[$i]["email_user"] . '",
                    "' . $value[$i]["name_rol"] . '",
                  ],';

            }

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 

		 }';

        echo $dataJson;

    }

}

$showTable = new TableUsers();
$showTable->showTableUsers();