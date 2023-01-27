<h1 class="d-flex justify-content-center">Lenguajes</h1>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
    </p>
  </div>
</div>
<div class="lanuages-client">
  <?php
  $item = null;
  $value = null;
  $languages = ControladorInformacion::ctrMostrarInformacion($item, $value);

  foreach ($languages as $key => $language) {
    echo '<td style="background-color:white; color:black; border: 1px white solid;">' . $language["nombre"] . '</td>
            <td style="background-color:white; color:black; border: 1px white solid;">' . $language["mision"] . '</td>
            <td style="background-color:white; color:black; border: 1px white solid;">' . $language["vision"] . '</td>
                    <td style=" background-color:white; color:black; border: 1px white solid;">' . $language["quienes_somos"] . '</td>
                    <td><img src="' . $language["logo"] . '" width="150px"></td>
                    <td style="width:10px; background-color:white; color:black; border: 1px white solid;">
                    <div class="btn-group" >
                        <button class="btn btn-warning btnEditarInformacion" style="background:#63FC00; color:black; border: 2px #63FC00 solid;" idInformacion="' . $language["id"] . '" data-toggle="modal" data-target="#modalEditarInformacion"><i class="fa fa-pencil"></i></button>
                    </div>
                    </td>
                  </tr>';
  }
  ?>
</div>