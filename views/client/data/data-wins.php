<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

class TableWins
{
    public function showTableWins()
    {
        $itemEx = "idUser";
        $item = "state_win";
        $valueEx = $_GET["idUser"];
        $value = 1;
        $optionEx = "*";

        $wins = ExerciseController::ctrShowWins($itemEx, $item, $value, $valueEx, $optionEx);

        if (count($wins) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($wins); $i++) {

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $wins[$i]["name_language"] . '",
			      "' . $wins[$i]["name_exercise"] . '",
			      "' . $wins[$i]["date_win"] . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);
        $dataJson .= '] 

		 }';
        echo $dataJson;
    }

}

$showTable = new TableWins();
$showTable->showTableWins();