<div class="content">
  <link rel="stylesheet" href="assets/css/dashboard-admin.css">
    <center><h1> <b>Editar Lenguaje</b></h1></center>

    <div class="container py-3">
        <div class="col-sm-5 col-md-4">
            <form role="form" method="post">
                <input type="hidden" name="idLanguage" id="idLanguage" class="form-control">
                <div class="contain">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"><b>Nombre:</b></label>
                        <input type="text" name="nameLanguage" id="nameLanguage" class="form-control" value="">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label"><b>Descripcion:</b></label>
                        <input type="text" name="descriptionLanguage" id="descriptionLanguage" class="form-control" value="">
                    </div>
                    <div class="modal-footer">
                        <a href="dashboard-admin" class="btn btn-secondary">Cancelar</a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success" name="updateLenguage">Guardar</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>    
             <?php
                $updateLenguage = new DashboardAdminController();
                $updateLenguage->ctrUpdateLanguages();
             ?>
            </form>
        </div>
    </div>
</div>
