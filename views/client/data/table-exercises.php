<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

class DataExercise
{
    public function showTableExercises()
    {
        $optionEx = "*";
        $item = "idUser";
        $item2 = "id_label";
        $value = $_GET["idUser"];
        $value2 = $_GET["idLabel"];
        $result = ExerciseController::ctrListExercises($item, $item2, $value, $value2, $optionEx);
        if (count($result) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($result); $i++) {

            $options = "<div class='btn-group'><button class='btn btn-success openExercise' idExercise='" . $result[$i]["id_exercise"] . "' idLanguage='" . $result[$i]["id_language"] . "' idLabel='" . $result[$i]["id_label"] . "'></i>Intentalo</button></div>";
            if ($result[$i]["state_win"] != 0) {
                $state = "<button class='btn btn-info disabled' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Realizado</button>";
            } else {
                $state = "<button class='btn btn-warning disabled' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Pendiente</button>";
            }
            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $result[$i]["name_exercise"] . '",
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

$showTable = new DataExercise();
$showTable->showTableExercises();

?>