<div class="content">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardClientController::ctrShowLanguages($item, $value);
    foreach ($languages as $key => $language) {
        echo '<h1 class="card-title" style="margin-bottom: 0;">' . $language["name"] . '</h1>';
    }
    ?>
</div>