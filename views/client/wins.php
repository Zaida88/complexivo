<link rel="stylesheet" href="assets/css/wins.css">
<div class="content">
    <h1><b>Logros</b></h1>
    <div class="d-flex justify-content-center win">
        <div class="box-body" style="width:85%;">
            <table class="table table-striped table-sm table-responsive bg-body-secondary wins" style="width:100%;">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Lenguaje</th>
                        <th>Nombre del ejercicio</th>
                        <th style="width:12%;">fecha</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <input type="hidden" value="<?php echo $_SESSION['id_user']; ?>" id="idUser">
</div>
<script src="assets/js/wins.js"></script>