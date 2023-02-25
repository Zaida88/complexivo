<?php
require_once "../../../controllers/code.controller.php";
require_once "../../../models/code.model.php";

class TableCode
{
    public function showTableCodes()
    {
        $item = "idExercise";
        $value = $_GET["idExercises"];
        $codes = CodeController::ctrListCodes($item, $value);

        if (count($codes) == 0) {

            echo '{"data": []}';
            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($codes); $i++) {

            $options = "<div class='btn-group'><button class='btn btn-info updateCode' idCode='" . $codes[$i]["id_code"] . "' data-bs-toggle='modal' data-bs-target='#updateCodeModal'><i class='fa-solid fa-pen-to-square'></i></button><button class='btn btn-danger deleteCode' idCode='" . $codes[$i]["id_code"] . "'><i class='fa-regular fa-circle-xmark'></i></button></div>";

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $codes[$i]["name_code"] . '",
			      "' . $codes[$i]["number_code"] . '",
			      "' . $options . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 

		 }';

        echo $dataJson;

    }

}

$showTable = new TableCode();
$showTable->showTableCodes();
