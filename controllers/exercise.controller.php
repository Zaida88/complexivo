<?php

class ExerciseController
{
    static public function ctrListExercises($itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlListExercises($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }

    static public function ctrListExercisesFilter($itemEx, $item, $value, $valueEx, $item1, $value1, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlListExercisesFilter($table, $itemEx, $item, $value, $valueEx, $item1, $value1, $optionEx);

        return $result;

    }

    static public function ctrShowWins($itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlShowWins($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }

    static public function ctrShowWinsFilter($itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlShowWins($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }

    static public function ctrSaveStatus($value, $idLanguage)
    {
        if (isset($_POST['code'])) {
            $user = $_SESSION["id_user"];
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
                    .then((value) => {
                        window.location = "index.php?routes=list-exercises&idLanguage=" + ' . $idLanguage . ';
                    });
                         </script>';
                }
            } else {
                echo '<script>
                window.location = "index.php?routes=list-exercises&idLanguage=" + ' . $idLanguage . ';
                </script>';
            }
        }
    }
}
?>