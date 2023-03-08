<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";
require_once "../../../models/label.model.php";

class DataSaveStatus
{
    public function saveStatus()
    {
        $value = $_GET["idExercises"];
        $user = $_GET["idUser"];
        $table = "wins";
        $item1 = "idUser";
        $item2 = "state_win";
        $item3 = "idExercise";
        $date = date('Y-m-d');
        $value1 = 0;
        $optionEx = "*";
        $result = ExerciseModel::mdlShowWin($table, $item1, $item2, $item3, $user, $value1, $value, $optionEx);
        if ($result) {
            $value1 = 1;
            $data = array(
                "idExercise" => $value,
                "idUser" => $user,
                "state_win" => $value1,
                "date_win" => $date
            );
            $reply = ExerciseModel::mdlUpdateStatus($table, $data);

            if ($reply == "ok") {
                $tableExs = "win_user";
                $itemExs = "id_label";
                $valueExs = $_GET["idLabel"];
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
                    $value1 = 1;
                    $data = array(
                        "idLabel" => $_GET["idLabel"],
                        "idUser" => $_GET["idUser"],
                        "state_label" => $value1
                    );
                    $reply = LabelModel::mdlUpdateStatus($table2, $data);
                    if ($reply == "ok") {
                        echo '<script>
                        swal("¡Felicidades, finalizaste todos los ejercicios disponiles en esta etiqueta!", "", "success")
                        </script>';
                    }

                } else {
                    echo '<script>
                    swal("¡Felicidades, nuevo logro conseguido!", "", "success")
                    </script>';
                }
            }
        }
    }
}

if (isset($_GET['idExercises'])) {
    $exercise = new DataSaveStatus();
    $exercise->saveStatus();
} ?>