<?php

class ExerciseController
{
    static public function ctrListExercisesAdmin($item, $value)
    {
        $table = "exercises";
        $result = ExerciseModel::mdlListExercisesAdmin($table, $item, $value);

        return $result;

    }

    static public function ctrTableExercises($item, $value)
    {
        $table = "exercises";
        $result = ExerciseModel::mdlTableExercises($table, $item, $value);

        return $result;

    }

    static public function ctrShowExercise($item, $value)
    {
        $table = "exercises";
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

    static public function ctrCreateExercise()
    {
        if (isset($_POST['createExercise'])) {
            $table1 = "exercises";
            $item1 = "name_exercise";
            $value1 = $_POST["name_exercise"];
            $option1 = "*";
            $result1 = ExerciseModel::mdlListExercisesAdminCreate($table1, $item1, $value1, $option1);

            if (empty($result1)) {

                $table = "exercises";

                $img1 = $_FILES["img_example_exercise"]["name"];
                $path1 = $_FILES["img_example_exercise"]["tmp_name"];
                $name = $_POST["name_exercise"];
                $name = rtrim($name);
                $name = ltrim($name);
                $route = "assets/img/exercises/";
                if (!file_exists($route)) {
                    mkdir($route, 0777);
                }
                $imgExampleExercise = $route . $name . "example" . $img1;
                copy($path1, $imgExampleExercise);

                $img2 = $_FILES["img_result_exercise"]["name"];
                $path2 = $_FILES["img_result_exercise"]["tmp_name"];

                $imgResultExercise = $route . $name . "result" . $img2;
                copy($path2, $imgResultExercise);


                $data = array(
                    "idLabel" => $_POST["id_label"],
                    "name_exercise" => $_POST["name_exercise"],
                    "description_exercise" => $_POST["description_exercise"],
                    "img_example_exercise" => $imgExampleExercise,
                    "img_result_exercise" => $imgResultExercise
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

                    foreach ($_POST["nameCode"] as $index2 => $value) {
                        CodeModel::mdlCreateCode($table3, $_SESSION["exercise"], $value, $number);
                        $number++;
                    }

                    echo '<script>
                    swal("Ejercicio agregado con exito", "", "success")
                    .then((value) => {
                        window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
                    });
                         </script>';
                }

            } else {
                echo '<script>
                swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                .then((value) => {
                    window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
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
                $item1 = "id_exercise";
                $value1 = $_POST["idExercise"];
                $option = "name_exercise";
                $result1 = ExerciseModel::mdlVerifyExercises($table1, $item1, $value1, $option);
                $_SESSION["f"] = 0;

                foreach ($result1 as $index => $value) {
                    if (in_array($_POST["nameExercise"], $value) == 1) {
                        $_SESSION["f"]++;
                    }
                }

                if ($_SESSION["f"] == 0) {
                    $name = $_POST["nameExercise"];
                    $name = rtrim($name);
                    $name = ltrim($name);
                    $route = "assets/img/exercises/";
                    if ($_FILES['imgExampleExercise']['error'] == 0 && !$_FILES['imgResultExercise']['error'] == 0) {
                        $table = "exercises";

                        $img = $_FILES["imgExampleExercise"]["name"];
                        $path = $_FILES["imgExampleExercise"]["tmp_name"];

                        if (!file_exists($route)) {
                            mkdir($route, 0777);
                        }

                        $imgExampleExercise = $route . $name . "example" . $img;
                        copy($path, $imgExampleExercise);

                        $data = array(
                            "id_exercise" => $_POST["idExercise"],
                            "name_exercise" => $_POST["nameExercise"],
                            "description_exercise" => $_POST["descriptionExercise"],
                            "img_example_exercise" => $imgExampleExercise
                        );
                        $results = ExerciseModel::mdlUpdateExerciseImgExample($table, $data);

                        if ($results == "ok") {
                            echo '<script>
                            swal("Actualizado con exito", "", "success")
                            .then((value) => {
                                window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
                            });
                            </script>';
                        }

                    } elseif ($_FILES['imgResultExercise']['error'] == 0 && !$_FILES['imgExampleExercise']['error'] == 0) {
                        $table = "exercises";

                        $img = $_FILES["imgResultExercise"]["name"];
                        $path = $_FILES["imgResultExercise"]["tmp_name"];

                        if (!file_exists($route)) {
                            mkdir($route, 0777);
                        }
                        $imgResultExercise = $route . $name . "result" . $img;
                        copy($path, $imgResultExercise);

                        $data = array(
                            "id_exercise" => $_POST["idExercise"],
                            "name_exercise" => $_POST["nameExercise"],
                            "description_exercise" => $_POST["descriptionExercise"],
                            "img_result_exercise" => $imgResultExercise
                        );
                        $results = ExerciseModel::mdlUpdateExerciseImgResult($table, $data);

                        if ($results == "ok") {
                            echo '<script>
                            swal("Actualizado con exito", "", "success")
                            .then((value) => {
                                window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
                            });
                            </script>';
                        }
                    } elseif ($_FILES['imgResultExercise']['error'] == 0 && $_FILES['imgExampleExercise']['error'] == 0) {
                        $table = "exercises";

                        $img1 = $_FILES["imgExampleExercise"]["name"];
                        $path1 = $_FILES["imgExampleExercise"]["tmp_name"];
                        if (!file_exists($route)) {
                            mkdir($route, 0777);
                        }

                        $imgExampleExercise = $route . $name . "example" . $img1;
                        copy($path1, $imgExampleExercise);

                        $img2 = $_FILES["imgResultExercise"]["name"];
                        $path2 = $_FILES["imgResultExercise"]["tmp_name"];
                        $imgResultExercise = $route . $name . "result" . $img2;
                        copy($path2, $imgResultExercise);


                        $data = array(
                            "id_exercise" => $_POST["idExercise"],
                            "name_exercise" => $_POST["nameExercise"],
                            "description_exercise" => $_POST["descriptionExercise"],
                            "img_example_exercise" => $imgExampleExercise,
                            "img_result_exercise" => $imgResultExercise
                        );
                        $results = ExerciseModel::mdlUpdateExerciseImgs($table, $data);

                        if ($results == "ok") {
                            echo '<script>
                            swal("Actualizado con exito", "", "success")
                            .then((value) => {
                                window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
                            });
                            </script>';
                        }
                    } else {
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
                            window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
                        });
                        </script>';
                        }
                    }

                } else {
                    echo '<script>
                    swal("El nombre del ejercicio ya se encuentra registrado", "", "error")
                    .then((value) => {
                        window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';
                    });
                    </script>';
                }

            } else {
                echo '<script>
				swal("Los campos no pueden estar vacios", "", "error")
				.then((value) => {
                    window.location = "index.php?route=list-exercises&idLabel=" + ' . $_POST["id_label"] . ';

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
                            window.location = "index.php?route=list-exercises&idLabel=" + ' . $_GET["idLabel"] . ';
                        });
                             </script>';
                    }
                }
            }
        }

    }

    static public function ctrSearchExercise($value, $value2, $value3)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlSearchExercise($table, $value, $value2, $value3);
        return $result;

    }
    static public function ctrSearchExerciseFilter($item, $item2, $item3, $value, $value2, $value3, $value4)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlSearchExerciseFilter($table, $item, $item2, $item3, $value, $value2, $value3, $value4);
        return $result;

    }
}
?>