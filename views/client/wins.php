<div class="content">
    <div class="d-flex justify-content-center">
        <h1>Logros</h1>
    </div><br>
    <div class="d-flex justify-content-center">

    <table class="table table-bordered" style="width: 80%;">
        <thead>
            <tr>
                <th>Ejercicio</th>
                <th style="width: 3%;"></th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php
            $itemEx = "id_user";
            $item = "state";
            $valueEx = $_SESSION["id"];
            $value = 1;
            $optionEx = "*";
            $exercise = ExerciseController::ctrShowWins($itemEx, $item,$value,$valueEx, $optionEx);
            foreach ($exercise as $key => $values) { ?>
                <tr>
                    <td>
                        <?php echo $values["name_exercise"]; ?>
                    </td>
                    <td class="position-relative px-5">
                    <i class="fa-sharp fa-solid fa-trophy"></i>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>


    </div>

</div>