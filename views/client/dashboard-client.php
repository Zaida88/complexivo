<div class="content" style="margin-bottom: 3%">
  <h1><b>Inicio</b></h1>
  <div class="row">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardClientController::ctrShowLanguages($item, $value);
    foreach ($languages as $key => $language) { ?>
      <div class="col-sm-4 mb-5 mb-sm-0 go">
        <a style="padding: 0;" class="openLanguage btn" idLanguage="<?php echo $language["id_language"] ?>">
          <div class="card rounded-4">
            <img src="<?php echo $language["logo_language"] ?>" class="card-img-top" alt="logo"
              style="width:100%;height: 245px;">
            <div class="card-body">
              <div class="justify-content-center">
                <h5 class="card-title mb-3" style="margin-bottom: 0;"><b>
                    <?php echo $language["name_language"] ?>
                  </b></h5>
              </div>
              <p class="card-text" style="margin-top: -20px;">
                <?php echo $language["description_language"] ?>
              </p>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>

<script src="assets/js/client/dashboard-client.js"></script>