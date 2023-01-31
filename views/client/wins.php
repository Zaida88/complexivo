<div class="content d-block justify-content-center">
    <div class="d-flex justify-content-center">
        <h1>Logros</h1>
    </div>
    <table class="table table-bordered border-danger-subtle">
        <thead>
            <tr>
                <th>Lenguaje</th>
                <th>Nombre</th>
                <th style="width: 4%;">Finalizado</th>
            </tr>
        </thead>

        <tbody class="table-group-divider border-danger-subtle">
            <?php
            $itemEx = "id_user";
            $item = null;
            $value = null;
            $valueEx = $_SESSION["id"];
            $optionEx = "*";
            $exercise = ExerciseController::ctrShowWins($itemEx, $valueEx, $optionEx);
            foreach ($exercise as $key => $values) { ?>
                <tr>
                    <td>
                        <?php echo $values["name"]; ?>
                    </td>
                    <td>
                        <?php echo $values["name_exercise"]; ?>
                    </td>
                    <td class="position-relative px-5">
                        <input class="form-check-input" type="checkbox" <?php echo $values['state'] == true ? 'checked' : ''; ?>
                            onclick="return false;">
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>