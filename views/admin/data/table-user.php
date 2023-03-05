<?php
require_once "../../../controllers/user.controller.php";
require_once "../../../models/user.model.php";

class TableUsers
{

    public function showTableUsers()
    {

        $users = UsersController::ctrTableUsers();

        if (count($users) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($users); $i++) {

            if($users[$i]["state_user"] != 0){
                $state = "<button class='btn btn-success btn-sm btnActivate' idUser='".$users[$i]["id_user"]."' stateUser='0'>Activado</button>";
            }else{
                $state = "<button class='btn btn-danger btn-sm btnActivate' idUser='".$users[$i]["id_user"]."' stateUser='1'>Desactivo</button>";
            }
            $options = "<div class='btn-group'><button class='btn btn-primary btn-sm updateUser' idUser='" . $users[$i]["id_user"] . "' data-bs-toggle='modal' data-bs-target='#updateUserModal'><i class='fa-solid fa-user-pen'></i></button></div>";
            $dataJson .= '[
                    "' . ($i + 1) . '",
                    "' . $users[$i]["username_user"] . '",
                    "' . $users[$i]["email_user"] . '",
                    "' . $users[$i]["name_rol"] . '",
                    "' . $state . '",
                    "' . $options . '"
                  ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 

		 }';

        echo $dataJson;

    }

}

$showTable = new TableUsers();
$showTable->showTableUsers();