<link rel="stylesheet" href="assets/css/login.css">
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center">
                        <form method="post">
                            <div class="mb-md-3 mt-md-3 pb-2">
                                <h3 class="fw-bold text-uppercase">Restablecer contraseña</h3>
                                <?php
                                $resetPass = new UsersController();
                                $resetPass->ctrResetPass();
                                ?>
                                <div class="alert alert-primary p-2" role="alert">
                                    Por favor, introduzca su correo electrónico registrado para que pueda recibir una
                                    nueva
                                    contraseña.
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg"
                                        placeholder="correo" required/>
                                </div>
                                <div class="float-sm-start">
                                    <a href="home"><button type="button"
                                            class="btn btn-secondary  btn-lg px-4">Cancelar</button></a>
                                </div>
                                <div class="float-sm-end">
                                    <button class="btn btn-outline-light btn-lg px-4" type="submit">Restablecer</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>