<?php
/*require_once "../../controllers/label.controller.php";
require_once "../../models/label.model.php";

/*class TableLabels
{

    public function showTableLabels()
    {

        $item = "idLanguage";
        $value = $_GET["idLanguages"];
        $labels = LabelController::ctrTableLabels($item, $value);

        if (count($labels) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($labels); $i++) {

            $options = "<div class='btn-group'><button class='btn btn-success openCards' idLanguage='" . $exercises[$i]["idLanguage"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-solid fa-rectangle-list'></i>&nbsp;Ver tarjetas</button><button class='btn btn-info updateExercise' idLanguage='" . $exercises[$i]["idLanguage"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "' data-bs-toggle='modal' data-bs-target='#updateExerciseModal'><i class='fa-solid fa-pen-to-square'></i></button>     <button class='btn btn-danger deleteExercise' idLanguage='" . $exercises[$i]["idLanguage"] . "' idExercise='" . $exercises[$i]["id_exercise"] . "'><i class='fa-regular fa-circle-xmark'></i></button></div>";

            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $labels[$i]["name_label"] . '",
			      "' . $labels[$i]["description_label"] . '",
			      "' . $labels[$i]["img_label"] . '",
			      "' . $options . '"
			    ],';

        }

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= '] 
		 }';

        echo $dataJson;


    }



}

$showTable = new TableLabels();
$showTable->showTableLabels();