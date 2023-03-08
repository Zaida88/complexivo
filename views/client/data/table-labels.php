<?php
require_once "../../../controllers/label.controller.php";
require_once "../../../models/label.model.php";

class TableLabelsClient
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
            
            $options = "<div class='btn-group'><button class='btn btn-success openLabel' numberLabel='" . $labels[$i]["number_label"] . "' idLanguage='" . $labels[$i]["idLanguage"] . "' idLabel='" . $labels[$i]["idLabel"] . "'></i><b>Informate</b></button></div>";
            if($labels[$i]["state_label"] != 0){
                $state = "<button class='btn btn-info disabled' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'><b>Terminado</b></button>";
            }else{
                $state = "<button class='btn btn-warning disabled' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'><b>Incompleto</b></button>";
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