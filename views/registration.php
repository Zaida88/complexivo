<link rel="stylesheet" href="assets/css/registration.css">
<section class="container-fluid gradient-custom pt-5" style="">
    <div class="d-flex justify-content-center">
        <div class="col-sm-6 mb-sm-0">
            <form method="post" class="card rounded-5 bg-dark text-white" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="text-center">
                        <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
                    </div>
                    <?php
                    $registration = new UsersController();
                    $registration->ctrCreateUser();
                    ?>
                    <div class="row align-items-start">
                        <div class="col">
                            <div class="mb-3">
                                <label for="newUsername" class="form-label">Nombre de usuario</label>
                                <input type="text" name="newUsername" class="form-control" pattern="[a-zA-Z0-9]+"
                                    title="Solo se permiten letras y números (sin espacios)" required>
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Nombre</label>
                                <input type="text" name="first_name" class="form-control" pattern="[a-zA-Z]+"
                                    title="Solo se permiten letras" required>
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Apellido</label>
                                <input type="text" name="last_name" class="form-control" pattern="[a-zA-Z]+"
                                    title="Solo se permiten letras">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" class="form-control"
                                    pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
                                    title="Se debe ingresar un correo valido" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="password1" class="form-label">Contraseña</label>
                                <input type="password" name="password1" class="form-control"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Debe contener al menos un número, una letra mayúscula,una minúscula y al menos 8 caracteres"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="password2" class="form-label">Repetir contraseña</label>
                                <input type="password" name="password2" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="newPhoto" class="form-label">Foto de perfil: </label>
                                <div class="file-select" id="src-file2">
                                    <input type="file" class="newPhoto" name="newPhoto" accept="image/*">
                                </div>
                                <img src="assets/img/users/user-default.png" class="previewImg" width="180px">
                            </div>
                        </div>
                    </div>
                    <div class="float-sm-start ms-5">
                        <a href="home"><button type="button" class="btn btn-secondary btn-lg px-4">Cancelar</button></a>
                    </div>
                    <div class="float-sm-end me-5">
                        <button type="submit" class="btn btn-primary btn-lg px-4" name="record">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>