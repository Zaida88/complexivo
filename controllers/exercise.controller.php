<?php

class ExerciseController
{
    static public function ctrListExercisesAdmin($item, $value, $optionEx)
    {
        $table = "exercises";
        $result = ExerciseModel::mdlListExercisesAdmin($table, $item, $value, $optionEx);

        return $result;

    }

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

    static public function ctrCreateExercise()
    {
        if (isset($_POST['createExercise'])) {
            $idLanguage = $_POST["idLanguage"];
            $table1 = "exercises";
            $item1 = "name_exercise";
            $value1 = $_POST["name_exercise"];
            $option1 = "*";
            $result1 = ExerciseModel::mdlListExercisesAdminCreate($table1, $item1, $value1, $option1);
            function prefix_console_log_message($message)
            {
                return "<script>console.log('{$message}')</script>";
            }
            if (empty($result1)) {

                foreach ($_POST["nameCode"] as $index => $value) {

                    echo prefix_console_log_message($index);
                }
                // $table = "exercises";
                // $data = array(
                //     "idLanguage" => $_POST["idLanguage"],
                //     "name_exercise" => $_POST["name_exercise"],
                //     "description_exercise" => $_POST["description_exercise"]
                // );
                // $result = ExerciseModel::mdlCreateExercise($table, $data);

                // if ($result=="ok") {

                //     $result1 = ExerciseModel::mdlListExercisesAdminCreate($table1, $item1, $value1, $option1);

                //     foreach ($result1 as $index => $value) {
                //         function write_to_console($data) {
                //             $console = $data;
                //             if (is_array($console))
                //             $console = implode(',', $console);

                //             echo "<script>console.log('Console: " . $console . "' );</script>";
                //            }
                //            write_to_console($value["id_exercise"]);
                //     }

                //     echo '<script>
                //     swal("Ejercicio agregado con exito", "", "success")
                //     .then((value) => {
                //         window.location = "index.php?routes=list-exercises&idLanguage=" + ' . $idLanguage . ';
                //     });
                //          </script>';
                // }

            } else {
                echo '<script>
                swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                .then((value) => {
                    window.location = "index.php?routes=list-exercises&idLanguage=" + ' . $idLanguage . ';
                });
                     </script>';
            }

        }
    }
}
?>