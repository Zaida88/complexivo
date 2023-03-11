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
                                <input type="text" name="newUsername" class="form-control" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+"
                                    title="Solo se permiten letras y números (sin espacios)" required>
                            </div>

                            <div class="mb-3">
                                <label for="first_name" class="form-label">Nombre</label>
                                <input type="text" name="first_name" class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]+"
                                    title="Solo se permiten letras (sin espacios)" required>
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Apellido</label>
                                <input type="text" name="last_name" class="form-control" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ]+"
                                    title="Solo se permiten letras (sin espacios)" required>
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
                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"
                                    title="Mínimo 8 caracteres,maximo 12, al menos una letra mayúscula, una letra minúscula, un número y un carácter especial (sin espacios)"
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
                    <div class="d-flex justify-content-between">
                        <a href="home"><button type="button" class="btn btn-secondary btn-lg px-4">Cancelar</button></a>
                        <button type="submit" class="btn btn-primary btn-lg px-4" name="record">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>