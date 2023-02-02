<?php

class ExerciseController
{
    static public function ctrListExercises($itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlListExercises($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }

    static public function ctrShowWins($itemEx, $item, $value, $valueEx, $optionEx)
    {
        $table = "win_user";
        $result = ExerciseModel::mdlShowWins($table, $itemEx, $item, $value, $valueEx, $optionEx);

        return $result;

    }

    static public function ctrSaveStatus($value)
    {
        if (isset($_POST['code'])) {
            $user = $_SESSION["id"];
            $table = "wins";
            $item1 = "id_user";
            $item2 = "state";
            $item3 = "id_exercise";
            $value1 = 0;
            $optionEx = "state";
            $result = ExerciseModel::mdlShowWin($table, $item1, $item2, $item3, $user, $value1, $value, $optionEx);
            if ($result) {
                $value1 = 1;
                $data = array(
                    "id_exercise" => $value,
                    "id_user" => $user,
                    "state" => $value1
                );

                $reply = ExerciseModel::mdlUpdatestatus($table, $data);
                if ($reply == "ok") {
                    echo '<script>
                					swal({
                						type: "success",
                						title: "Felicidades,nuevo logro conseguido!",
                						showConfirmButton: true
                					}).then(function(result){
                						if(!result.value){				
                							"index.php?routes=exercise&idExercise=" + $item3;
                						}
                					})
                					</script>';
                }else {
                    echo '<script>
                    swal({
                        type: "success",
                        title: "si",
                        showConfirmButton: true
                    }).then(function(result){
                        if(!result.value){				
                            "index.php?routes=exercise&idExercise=" + $item3;
                        }
                    })
                    </script>';
                }
            }
        }
    }
}
?>