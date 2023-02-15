<?php

require_once "../../models/user.model.php";

$users = new users();
$id_user = $_POST['id_user'];
$state_user = $_POST['state_user'];
echo $users->changeStateUser($id_user, $state_user);
