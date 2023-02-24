<?php
require_once "../../../controllers/exercise.controller.php";
require_once "../../../models/exercise.model.php";

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
                echo '<script>
                swal("¡Felicidades, nuevo logro conseguido!", "", "success")
                     </script>';
            }
        }
    }
}

if (isset($_GET['idExercises'])) {
    $exercise = new DataSaveStatus();
    $exercise->saveStatus();
}?>
