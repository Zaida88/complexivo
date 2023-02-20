<?php
require_once "../../controllers/exercise.controller.php";
require_once "../../models/exercise.model.php";

class TableExercises
{

    public function showTableExercises()
    {

        $item = "idLanguage";
        $value = $_GET["idLanguages"];
        $exercises = ExerciseController::ctrTableExercises($item, $value);

        if (count($exercises) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($exercises); $i++) {

            $options = "<div class='btn-group'><button class='btn btn-success openCards' idLanguage='" . $exercises[$i]["idLanguage"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-solid fa-rectangle-list'></i>&nbsp;Ver tarjetas</button><button class='btn btn-info updateExercise' idLanguage='" . $exercises[$i]["idLanguage"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "' data-bs-toggle='modal' data-bs-target='#updateExerciseModal'><i class='fa-solid fa-pen-to-square'></i></button>     <button class='btn btn-danger deleteExercise' idLanguage='" . $exercises[$i]["idLanguage"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-regular fa-circle-xmark'></i></button></div>";

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $exercises[$i]["name_exercise"] . '",
			      "' . $exercises[$i]["description_exercise"] . '",
			      "' . $options . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 

		 }';

        echo $dataJson;


    }



}

$showTable = new TableExercises();
$showTable->showTableExercises();