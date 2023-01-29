<link rel="stylesheet" href="assets/css/home.css">

<main class="container-fluid p-4 mt-4 mb-0">
    <div class="d-flex justify-content-center">
        <div class="col-sm-5 mb-sm-0">
            <form method="post" class="card bg-body-tertiary" enctype="multipart/form-data">
                <div class="card-body ">
                    <div class="text-center">
                        <h3>Registro</h3>
                    </div>
                    <?php
                    $registration = new UsersController();
                    $registration->ctrCreateUser();
                    ?>
                    <div id="contain">
                        <div id="prin">
                            <div  class="mb-3">
                                <label for="newUsername" class="form-label">Nombre de usuario:</label>
                                <input type="text" name="newUsername" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Nombre:</label>
                                <input type="text" name="first_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Apellido:</label>
                                <input type="text" name="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div id="prin1">
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password1" class="form-label">Contraseña:</label>
                                <input type="password" name="password1" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password2" class="form-label">Repetir contraseña:</label>
                                <input type="password" name="password2" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div id="containe">
                        <div id="nam">
                            <label for="newPhoto" class="form-label"><b>Foto de perfil: </b></label>
                            <input type="file" class="newPhoto" name="newPhoto" accept="image/*">
                        </div>
                        <div id="im">
                            <img src="assets/img/users/user-default.png" class="img-thumbnail previewImg" width="180px">
                            <input type="hidden" name="logoActual" id="logoActual">
                        </div>
                    </div><br>

                    <div class="float-sm-start">
                        <a href="home"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                    </div>

                    <div class="float-sm-end">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>