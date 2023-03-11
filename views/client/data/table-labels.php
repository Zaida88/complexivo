<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";
require_once "../../../models/exercise.model.php";

class TableLabelsClient
{
    public function showTableLabels()
    {

        $item = "idLanguage";
        $value = $_GET["idLanguages"];
        $item2 = "idUser";
        $value2 = $_GET["idUser"];
        $labels = LabelController::ctrTableLabels($item, $value, $item2, $value2);

        if (count($labels) == 0) {

            echo '{"data": []}';

            return;
        }

        $dataJson = '{
		  "data": [';

        for ($i = 0; $i < count($labels); $i++) {
            $tableExs = "win_user";
            $itemExs = "id_label";
            $valueExs = $labels[$i]["idLabel"];
            $itemExs2 = "idUser";
            $valueExs2 = $_GET["idUser"];
            $_SESSION["i"] = 0;
            $results = ExerciseModel::mdlListExercise($tableExs, $itemExs, $valueExs, $itemExs2, $valueExs2);
            foreach ($results as $key => $values) {
                if ($values["state_win"] == 1) {
                    $_SESSION["i"]++;
                }
            }

            if ($_SESSION["i"] == count($results)) {
                $table2 = "user_label";
                $data = array(
                    "idLabel" => $labels[$i]["idLabel"],
                    "idUser" => $_GET["idUser"],
                    "state_label" => 1
                );
                LabelModel::mdlUpdateStatus($table2, $data);
            } else {
                $table2 = "user_label";
                $data = array(
                    "idLabel" => $labels[$i]["idLabel"],
                    "idUser" => $_GET["idUser"],
                    "state_label" => 0
                );
                LabelModel::mdlUpdateStatus($table2, $data);
            }

            $options = "<div class='btn-group'><button class='btn btn-success openLabel' numberLabel='" . $labels[$i]["number_label"] . "' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["idLabel"] . "'><i class='fas fa-hand-point-right'></i>&nbsp;<b>Info</b></button></div>";
            if($labels[$i]["state_label"] != 0){
                $state = "<button class='btn btn-info disabled' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'><b>Terminado</b></button>";
            }else{
                $state = "<button class='btn btn-light disabled' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'><b>Incompleto</b></button>";
            }
            $dataJson .= '[
                  "' . ($i + 1) . '",
			      "' . $labels[$i]["name_label"] . '",
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

$showTable = new TableLabelsClient();
$showTable->showTableLabels();
?>