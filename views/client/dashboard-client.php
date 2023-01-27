<div class="content">
  <h1 class="d-flex justify-content-center">Lenguajes</h1>
  <div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
  <div class="lanuages-client">
    <?php
    $item = null;
    $value = null;
    $languages = DashboardClientController::ctrShowLanguages($item, $value);

    foreach ($languages as $key => $language) {
      echo '<td style="background-color:white; color:black; border: 1px white solid;">' . $language["nombre"] . '</td>
            <td style="background-color:white; color:black; border: 1px white solid;">' . $language["mision"] . '</td>
            <td style="background-color:white; color:black; border: 1px white solid;">' . $language["vision"] . '</td>
                    <td style=" background-color:white; color:black; border: 1px white solid;">' . $language["quienes_somos"] . '</td>
                    <td><img src="' . $language["logo"] . '" width="150px"></td>
                    <td style="width:10px; background-color:white; color:black; border: 1px white solid;">
                    </td>
                  </tr>';
    }
    ?>
  </div>
</div>