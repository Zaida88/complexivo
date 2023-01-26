<main class="container-fluid p-5 mt-5 mb-0">
    <div class="d-flex justify-content-center">
        <?php if (isset($_GET['error'])) { ?>
            <p class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </p>
        <?php } ?>
    </div>
    <div class="d-flex justify-content-center">
        <div class="col-sm-4 mb-sm-0">
            <form action="../php/resetPass.php" method="post" class="card bg-body-tertiary">
                <div class="card-body">
                    <div class="text-center">
                        <h3>Restablecer contraseña</h3>
                    </div>
                    <div class="alert alert-info" role="alert">
                        Por favor, introduzca su correo electrónico registrado para que pueda recibir una nueva
                        contraseña.
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="correo" required>
                    </div>
                    <div class="float-sm-start">
                    <a href="login"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                    </div>
                    <div class="float-sm-end">
                        <button name="reset_pass" class="btn btn-primary">Restablecer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>