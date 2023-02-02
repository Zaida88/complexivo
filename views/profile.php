<div class="content">
  <h1>Perfil</h1><br>
  <div class="container">
    <div class="row">
      <div class="col-sm-5 col-md-6">
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="card" style="width: 18rem;">
            <img src="<?php echo $_SESSION["photo"]; ?>" class="card-img-top previewImg"
              alt="<?php echo $_SESSION["photo"]; ?>">
            <div class="card-body">
              <div class="mb-3">
                <div class="file-select" id="src-file2">
                  <input type="file" class="newPhoto" name="newPhoto" accept="image/*">
                </div>
              </div>
              <div class="d-flex justify-content-center">
                <button name="photo" type="submit" class="btn btn-success">Guardar</button>
              </div>
            </div>
            <?php
            $updatePhoto = new UsersController();
            $updatePhoto->ctrChangePhoto();
            ?>
        </form>
      </div><br>
    </div>
    <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">otras cosas</div>
  </div>
</div>
</div>