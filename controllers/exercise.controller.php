<?php

class ExerciseController
{
    static public function ctrListExercisesAdmin($item, $value)
    {
        $table = "exercises";
        $result = ExerciseModel::mdlListExercisesAdmin($table, $item, $value);

        return $result;

    }

    static public function ctrShowExercise($item, $value)
    {
        $table = "exercise_code";
        $result = ExerciseModel::mdlShowExerciseAdmin($table, $item, $value);

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
                        window.location = "index.php?route=list-exercises&idLanguage=" + ' . $idLanguage . ';
                    });
                         </script>';
                }
            } else {
                echo '<script>
                window.location = "index.php?route=list-exercises&idLanguage=" + ' . $idLanguage . ';
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

            if (empty($result1)) {

                $table = "exercises";
                $data = array(
                    "idLanguage" => $_POST["idLanguage"],
                    "name_exercise" => $_POST["name_exercise"],
                    "description_exercise" => $_POST["description_exercise"]
                );
                $result = ExerciseModel::mdlCreateExercise($table, $data);

                if ($result == "ok") {
                    $table1 = "exercises";
                    $item1 = "name_exercise";
                    $value1 = $_POST["name_exercise"];
                    $result1 = ExerciseModel::mdlListExercisesAdmin($table1, $item1, $value1);


                    foreach ($result1 as $index => $value) {
                        $_SESSION["exercise"] = $value["id_exercise"];
                    }

                    $table3 = "codes";
                    $number = 1;

                    foreach ($_POST["nameCode"] as $indexEx => $value) {
                        CodeModel::mdlCreateCode($table3, $_SESSION["exercise"], $value, $number);
                        $number++;
                    }

                    echo '<script>
                    swal("Ejercicio agregado con exito", "", "success")
                    .then((value) => {
                        window.location = "index.php?route=list-exercises&idLanguage=" + ' . $idLanguage . ';
                    });
                         </script>';
                }

            } else {
                echo '<script>
                swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                .then((value) => {
                    window.location = "index.php?route=list-exercises&idLanguage=" + ' . $idLanguage . ';
                });
                     </script>';
            }

        }
    }

    static public function ctrUpdateExercise()
    {
        if (isset($_POST["updateExercise"])) {
            if (
                isset($_POST["nameExercise"]) &&
                isset($_POST["descriptionExercise"])
            ) {
                $table1 = "exercises";
                $item1 = "name_exercise";
                $value1 = $_POST["nameExercise"];
                $option1 = "*";
                $result1 = ExerciseModel::mdlListExercisesAdminCreate($table1, $item1, $value1, $option1);

                if (empty($result1)) {

                    $table = "exercises";
                    $data = array(
                        "id_exercise" => $_POST["idExercise"],
                        "name_exercise" => $_POST["nameExercise"],
                        "description_exercise" => $_POST["descriptionExercise"]
                    );
                    $results = ExerciseModel::mdlUpdateExercise($table, $data);

                    if ($results == "ok") {
                        echo '<script>
                                        swal("Actualizado con exito", "", "success")
                                        .then((value) => {
                                            window.location = "index.php?route=list-exercises&idLanguage=" + ' . $_POST["language"] . ';
                                        });
                                             </script>';
                    }

                } else {
                    echo '<script>
                    swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                    .then((value) => {
                        window.location = "index.php?route=list-exercises&idLanguage=" + ' . $_POST["language"] . ';
                    });
                         </script>';
                }

            } else {
                $idLanguage = $_POST["language"];
                echo '<script>
				swal("Los campos no pueden estar vacios", "", "error")
				.then((value) => {
                    window.location = "index.php?route=list-exercises&idLanguage=" + ' . $_POST["language"] . ';

				});
					 </script>';
            }
        }

    }

    static public function ctrDeleteExercise()
    {

        if (isset($_GET["idExercise"])) {

            $table1 = "wins";
            $data1 = $_GET["idExercise"];
            $data1 = (int) $data1;
            $result1 = WinsModel::mdlDeleteCode($table1, $data1);

            if ($result1 == "ok") {

                $table2 = "codes";
                $data2 = $_GET["idExercise"];
                $data2 = (int) $data2;
                $result2 = CodeModel::mdlDeleteCodes($table2, $data2);

                if ($result2 == "ok") {

                    $table3 = "exercises";
                    $data3 = $_GET["idExercise"];
                    $data3 = (int) $data3;
                    $result3 = ExerciseModel::mdlDeleteExercise($table3, $data3);

                    if ($result3 == "ok") {
                        echo '<script>
                        swal("El ejercicio ha sido borrado correctamente", "", "success")
                        .then((value) => {
                            window.location = "index.php?route=list-exercises&idLanguage=" + ' . $_GET["idLanguage"] . ';
                        });
                             </script>';
                    }
                }
            }
        }

    }
}
?>